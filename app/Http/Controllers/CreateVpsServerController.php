<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use DOMDocument;
use DOMXPath;
use DateTime;
use sburina\Whmcs;
use App\Virtualizor\Admin;

class CreateVpsServerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->virtualizorAdmin = new Admin();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $os_kind = [];
        $user = (array) Auth::user();
        $user = reset($user);
        
        $product_info = $this->getProductGroups();
        $product_group = $product_info[0];
        $system_info = $product_info[1];

        $product_info = $this->getProductGroups();
        $payment_methods = $this->getPaymentMethods();
        // $payment_user_token = $this->getuserPaymentToken();
        $products = $this->getProducts();
        $oslist = $this->getOSlist();
        
        foreach($oslist as $kind=>$os){
            array_push($os_kind,$kind);
        }
        
        foreach($oslist as $kind=>$os){
            foreach($os as $l=>$o){
                foreach($system_info as $system){
                    if($system['name'] == $o['name']){
                        $oslist[$kind][$l]['config_id'] = $system['id'];
                    }
                }
            }
        }

        return view('pages/create-vps-server', compact('products','product_group','oslist','os_kind','user','payment_methods'));
    }

    private function getProductGroups()
    {
        $system = array();

        $products = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetProducts',
       ]);
       
       $productGroups = [];
        foreach ($products['products']['product'] as $key=>$product) {
            
            $parts = explode('?', $product['product_url']);
            $group_names = explode('/', $parts[1]);

            $groupId = $product['gid'];
            if (!isset($productGroups[$groupId])) {
                $productGroups[$groupId] = ucfirst($group_names[2]);
            }

            if($key == 0){
                $system_lists = $product['configoptions']['configoption'][1]['options']['option'];
                foreach($system_lists as $system_info){
                    array_push(
                        $system,
                        array(
                            'id' => $system_info['id'],
                            'name' => $system_info['name']
                        )
                    );
                }
            }
        }

        return array($productGroups,$system);
    }

    private function getProducts()
    {
        $products_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetProducts',
        ]);

        if ($products_response['totalresults'] > 0) {
            $products = $products_response['products']['product'];
        }
        
        if(count($products)){
            foreach($products as $key=>$product){
                $products[$key]['server_info'] = array();
                $doc = new DOMDocument();
                $doc->loadHTML($product['description']);
                $xpath = new DOMXPath($doc);

                $items = $xpath->query('//ul[@class="list-unstyled pricing-feature-list"]/li');

                foreach ($items as $item) {
                    $span = $item->getElementsByTagName('span')->item(0);
                    $span_value = $span->nodeValue;
                    $value = trim($item->firstChild->nextSibling->nodeValue);

                    array_push($products[$key]['server_info'],$span_value." ".$value);
                }
            }
        }
        // print_r($product);exit;
        return $products;
    }

    private function getOSlist()
    {
        $oslists = $this->virtualizorAdmin->ostemplates();
        return $oslists['oslist']['proxk'];
    }
    
    private function getProductInfo()
    {
        $product_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetProductsGroups'
        ]);

        print_r($product_response);exit;
    }

    private function getPaymentMethods()
    {
        $payment_methods = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetPaymentMethods'
       ]);

       return $payment_methods['paymentmethods']['paymentmethod'];
    //    print_r($payment_methods);exit;
    }

    private function getuserPaymentToken()
    {
        $payment_methods = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetPayMethods',
            'clientid' => Auth::user()->client_id,
       ]);

       print_r($payment_methods);exit;
    }

    public function create(Request $request)
    {
        $configoptionsFields = array(
            base64_encode(
                serialize(
                    ["6" => $request->config_id]
                )
            )
        );

        $add_order_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'AddOrder',
            'clientid' => Auth::user()->client_id,
            'paymentmethod' => $request->paymentMethod,
            'hostname' => array($request->hostname),
            'rootpw' => array($request->pwd),
            'pid' => array($request->product_id),
            'configoptions' => $configoptionsFields,
       ]);
       if($add_order_response['result'] == 'success'){
            $add_order_response['redirect_url'] = route('overview', ['order_id' => $add_order_response['orderid']]);
            return response()->json($add_order_response, 200);
       }else{
           return response()->json($add_order_response, 500);
       }
    }

}
