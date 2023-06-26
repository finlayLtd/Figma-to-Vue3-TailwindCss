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
        
        $product_group = $this->getProductGroups();
        $payment_methods = $this->getPaymentMethods();
        // $payment_user_token = $this->getuserPaymentToken();
        $products = $this->getProducts();
        $oslist = $this->getOSlist();
        foreach($oslist as $kind=>$os)
            array_push($os_kind,$kind);
        
        return view('pages/create-vps-server', compact('products','product_group','oslist','os_kind','user','payment_methods'));
    }

    private function getProductGroups()
    {
        $products = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetProducts',
       ]);
       
       $productGroups = [];
        foreach ($products['products']['product'] as $product) {
            $parts = explode('?', $product['product_url']);
            $group_names = explode('/', $parts[1]);

            $groupId = $product['gid'];
            if (!isset($productGroups[$groupId])) {
                $productGroups[$groupId] = ucfirst($group_names[2]);
            }
        }

        return $productGroups;
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
        $customFields = [
            'OS | Operating System' => $request->os_name,
        ];
        
        $add_order_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'AddOrder',
            'clientid' => Auth::user()->client_id,
            'paymentmethod' => $request->paymentMethod,
            'hostname' => $request->hostname,
            'rootpw' => $request->pwd,
            'pid' => array($request->product_id),
            'customfields' => base64_encode(serialize($customFields)),
       ]);

       print_r($add_order_response);exit;
    }

}
