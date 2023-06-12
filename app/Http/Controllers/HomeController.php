<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DOMDocument;
use DOMXPath;
use sburina\Whmcs;
use App\Enduser;
use App\Admin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // var_dump(Auth::user());
        // exit();
        $total_tickets = 0;
        $tickets = [];
        $products = [];
        $states = [];
        $state_order = [];
        $product_group = [
            '2' => 'VPS-Netherlands',
            '3' => 'VPS-USA'
        ];
        
        $tickets_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetTickets',
            'limitstart' => 0,
            'limitnum' => 10, // Set number of tickets to retrieve per request
            'clientid' => Auth::user()->client_id, // Set number of tickets to retrieve per request
        ]);

        $order_state_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetOrderStatuses',
        ]);

        foreach ($order_state_response['statuses']['status'] as $state_info)
            array_push($states, $state_info['title']);
        asort($states);

        $orders_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetClientsProducts',
            'clientid' => Auth::user()->client_id,
        ]);

        $products_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetProducts',
        ]);

        // $products_group_response = (new \Sburina\Whmcs\Client)->post([
        //     'action' => 'GetProductGroups',
        // ]);

        // print_r($products_group_response);exit;

        if ($products_response['totalresults'] > 0) {
            foreach ($products_response['products']['product'] as $key => $product) {
                // unset($products_response['products']['product'][$key]['pricing']);
                // unset($products_response['products']['product'][$key]['configoptions']);
            }
            $products = $products_response['products']['product'];
        }

        // print_r($products);exit;
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

                // $products_stock_response = (new \Sburina\Whmcs\Client)->post([
                //     'action' => 'GetStock',
                //     'pid'=>$product['pid']
                // ]);

                // print_r($products_stock_response);exit;
            }
        }

        if ($orders_response['totalresults'] > 0) {
            $total_tickets = $orders_response['totalresults'];
            $orders = $orders_response['products']['product'];

            foreach ($states as $state)
                foreach ($orders as $order)
                    $state_order[$state] = [];

            foreach ($states as $state)
                foreach ($orders as $order){
                    if ($order['status'] == $state) {
                        array_push($state_order[$state], $order);
                        $last_index = count($state_order[$state]) - 1;
                        if(strpos($order['configoptions']['configoption'][1]['value'],'Netherlands') !== false){
                            $state_order[$state][$last_index]['flag'] = 'flag-en';
                        }else{
                            $state_order[$state][$last_index]['flag'] = 'flag-nl';
                        }
                        
                        $system = explode('-',$order['configoptions']['configoption'][1]['value'])[0];
                        switch($system){
                            case 'windows':
                                $state_order[$state][$last_index]['sys_log'] = 'windows'; break;
                            case 'ubuntu':
                                $state_order[$state][$last_index]['sys_log'] = 'ubuntu'; break;
                            case 'centos':
                                $state_order[$state][$last_index]['sys_log'] = 'centos'; break;
                            case 'debian':
                                $state_order[$state][$last_index]['sys_log'] = 'debian'; break;
                            case 'almalinux':
                                $state_order[$state][$last_index]['sys_log'] = 'almalinux'; break;
                            case 'fedora':
                                $state_order[$state][$last_index]['sys_log'] = 'fedora'; break;
                            case 'rocky':
                                $state_order[$state][$last_index]['sys_log'] = 'rocky'; break;
                        }
                    }
                }
        }
        
        

        if ($tickets_response['totalresults'] > 0) {
            $total_tickets = $tickets_response['totalresults'];
            $tickets = $tickets_response['tickets']['ticket'];
        }

        // $vps = $this->getVPSList();

        return view('pages/dashboard', compact('tickets', 'total_tickets', 'states', 'state_order', 'products', 'product_group'));
    }

    public function gettickets(Request $request)
    {
        $offset  = ($request->offset - 1) * 10;
        $tickets_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetTickets',
            'limitstart' => $offset,
            'limitnum' => 10, // Set number of tickets to retrieve per request
            'clientid' => Auth::user()->client_id, // Set number of tickets to retrieve per request
        ]);

        if ($tickets_response['totalresults'] > 0) {
            $total_tickets = $tickets_response['totalresults'];
            $tickets = $tickets_response['tickets']['ticket'];
        }

        return view('tables/dashboard-tickettable', compact('tickets', 'total_tickets'));
    }

    public function change_name(Request $request)
    {
        $response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'UpdateClient',
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'clientid' => Auth::user()->client_id, // Set number of tickets to retrieve per request
        ]);

        session()->put(config('whmcs.session_key'), (new \Sburina\Whmcs\Client)->post([
            'action' => 'getClientsDetails',
            'email' => Auth::user()->email,
        ]));

        if ($response['result'] == 'success') $message = 'success';
        else $message = 'failed';

        return redirect()->route('settings', ['message' => $message]);
    }

    public function change_password(Request $request)
    {
        // confirmpw, newpw, currentpw
        return view('pages/settings_password');
        // $response = (new \Sburina\Whmcs\Client)->post([
        //     'action' => 'UpdateClient',
        //     'firstname' => $request->firstname,
        //     'lastname' => $request->lastname,
        //     'clientid' => Auth::user()->client_id, // Set number of tickets to retrieve per request
        // ]);

        // if ($response['result'] == 'success') $message = 'success';
        // else $message = 'failed';

        // return redirect()->route('settings', ['message' => $message]);
    }

    public function invite_user(Request $request)
    {
        $permissions = '';
        foreach (['profile', 'contacts', 'products', 'manageproducts', 'productsso', 'domains', 'managedomains', 'invoices', 'quotes', 'tickets', 'affiliates', 'emails', 'orders'] as $permissionName) {
            if ($request->permissions == 'all' || $request->$permissionName) {
                if (strlen($permissions) > 0) {
                    $permissions .= ',';
                }
                $permissions .= $permissionName;
            }
        }
        $response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'CreateClientInvite',
            'client_id' => Auth::user()->client_id, //The ID of the client the invite is for
            'email' => $request->invite_email,
            'permissions' => $permissions,
        ]);
        if ($response['result'] == 'success') $message = 'success';
        else $message = 'failed';

        $users_list = [];
        $check_user_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetClientsDetails',
            'clientid' => Auth::user()->client_id, //The ID of the client the invite is for
        ]);
        if ($check_user_response['result'] == 'success') {
            $users_list = $check_user_response['client']['users']['user'];
        }
        return view('pages/settings_userManage', compact('users_list', 'message'));
    }





    public function remove_access(Request $request)
    {
        $response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'DeleteUserClient',
            'client_id' => Auth::user()->client_id, //The id of the client to remove the user from
            'user_id' => $request->user_id, //The id of the user to remove from the client
        ]);

        $users_list = [];
        $check_user_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetClientsDetails',
            'clientid' => Auth::user()->client_id, //The ID of the client the invite is for
        ]);
        if ($check_user_response['result'] == 'success') {
            $users_list = $check_user_response['client']['users']['user'];
        }
        return view('pages/settings_userManage', compact('users_list'));
    }

    public function managePermissions(Request $request) // manage permission of invited users
    {
        $user_id  = $request->id;
        $email = $request->email;

        $response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetUserPermissions',
            'client_id' => Auth::user()->client_id, //The ID of the client the invite is for
            'user_id' => $user_id,
        ]);

        $permissions = [];
        if ($response['result'] == 'success') {
            $permissions = $response['permissions'];
        }

        return view('pages/permission-detail', compact('permissions', 'user_id', 'email'));
    }

    public function edit_user_permissions(Request $request)
    {
        $permissions = '';
        foreach (['profile', 'contacts', 'products', 'manageproducts', 'productsso', 'domains', 'managedomains', 'invoices', 'quotes', 'tickets', 'affiliates', 'emails', 'orders'] as $permissionName) {
            if ($request->$permissionName) {
                if (strlen($permissions) > 0) {
                    $permissions .= ',';
                }
                $permissions .= $permissionName;
            }
        }

        $response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'UpdateUserPermissions',
            'client_id' => Auth::user()->client_id,
            'user_id' => $request->user_id,
            'permissions' => $permissions,
        ]);
        if ($response['result'] == 'success') $message = 'success_update_permission';
        else $message = 'failed';

        $users_list = [];
        $check_user_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetClientsDetails',
            'clientid' => Auth::user()->client_id, //The ID of the client the invite is for
        ]);
        if ($check_user_response['result'] == 'success') {
            $users_list = $check_user_response['client']['users']['user'];
        }
        return view('pages/settings_userManage', compact('users_list', 'message'));
    }



    private function getVPSList()
    {
        $key =  'N8q5PHMfwvMQHMHYkytYtTydVWoLsWNC';
        $pass = 'CcuJEN365CusfakK2NA8uVGSg0e8e36J';
        $ip = '37.59.33.165';
               
        $v = new Admin($ip, $key, $pass);
        // $post = array();
        // $post['user'] = Auth::user()->userid;

        $vps = $v->listvs();
        // print_r(count($vps));exit;
        print_r($vps);
        // exit;
        // return $vmList;
    }
}
