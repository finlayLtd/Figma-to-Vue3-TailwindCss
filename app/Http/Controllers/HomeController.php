<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DOMDocument;
use DOMXPath;
use sburina\Whmcs;
use App\Virtualizor\Admin;

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
        $this->virtualizorAdmin = new Admin();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_tickets = 0;
        $tickets = [];
        $products = [];
        $states = [];
        $state_order = [];
        $status = array(); //status of ticket 
        $product_group = $this->getProductGroups();
        
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
                        if(strpos($order['groupname'],'Netherlands') !== false){
                            $state_order[$state][$last_index]['flag'] = 'flag-nl';
                        }else{
                            $state_order[$state][$last_index]['flag'] = 'flag-en';
                        }
                        
                        if($state == 'Active'){
                            $page = 0;
                            $reslen = 0;
                            //For Searching
                            $post = array();
                            $post['vpsid'] = $order['customfields']['customfield'][1]['value'];
                            $vps_info = $this->virtualizorAdmin->listvs($page ,$reslen ,$post);
                            $vps_info = $vps_info[$post['vpsid']];
                            $system = explode('-',$vps_info['os_name'])[0];

                        }else{
                            $system = explode('-',$order['configoptions']['configoption'][1]['value'])[0];
                        }
                        
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
                            default:
                                $state_order[$state][$last_index]['sys_log'] = 'others'; break;
                        }
                    }
                }
        }
        
        if ($tickets_response['totalresults'] > 0) {
            $total_tickets = $tickets_response['totalresults'];
            $tickets = $tickets_response['tickets']['ticket'];
        }

        $tickets_status = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetSupportStatuses'
        ]);

        if ($tickets_status['totalresults'] > 0) {
            $status = $tickets_status['statuses']['status'];//status of ticket 
        }

        return view('pages/dashboard', compact('tickets', 'total_tickets', 'states', 'state_order', 'products', 'product_group', 'status'));
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
            if($request->order && $request->orderby){//if not exist pass
                if($request->order == 'desc') $tickets = collect($tickets)->sortByDesc($request->orderby)->values()->all();
                else  $tickets = collect($tickets)->sortBy($request->orderby)->values()->all();
            }
            
        }

        $tickets_status = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetSupportStatuses'
        ]);

        if ($tickets_status['totalresults'] > 0) {
            $status = $tickets_status['statuses']['status'];//status of ticket 
        }

        return view('tables/tickettable', compact('tickets', 'total_tickets', 'status'));
    }

    public function invoicelist(Request $request)
    {
        $response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetInvoices',
            'orderby' => $request->orderby,
            'order' => $request->order,
            // 'limitstart' => $offset,
            // 'limitnum' => 10, // Set number of tickets to retrieve per request
            'userid' => Auth::user()->client_id, // Set number of tickets to retrieve per request
        ]);
        if (count($response['invoices']) != 0) {
            $invoices = $response['invoices']['invoice'];
        } else $invoices = [];

        return view('tables/invoicetable', compact('invoices'));
    }

    public function get_funds(Request $request)
    {
        $response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetClientsDetails',
            'clientid' => Auth::user()->client_id,
        ]);


        if($response['result'] == 'success'){
            //if credit is different
            if($response['credit'] != Auth::user()->credit){
                // default system to set the session again!(switch account)
                $userAttributes = [];

                $userAttributes = (array) (new \Sburina\Whmcs\Client)->post([
                    'action' => 'getClientsDetails',
                    'clientid' => Auth::user()->client_id,
                ]);

                $userAttributes['originUserData'] = Auth::user()->originUserData;
                $userAttributes['permissions'] = Auth::user()->permissions;

                session()->put(config('whmcs.session_key'), $userAttributes);
            }

            return response()->json([
                'result' => 'success',
                'latest_user_data' => $response,
            ]);
        } else{
            return response()->json([
                'result' => 'failed',
            ]);
        }
    }

    public function change_name(Request $request)
    {
        $response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'UpdateClient',
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'clientid' => Auth::user()->client_id, // Set number of tickets to retrieve per request
        ]);

        // default system to set the session again!(switch account)
        $userAttributes = [];

        $userAttributes = (array) (new \Sburina\Whmcs\Client)->post([
            'action' => 'getClientsDetails',
            'email' => Auth::user()->email,
        ]);

        $userAttributes['originUserData'] = Auth::user()->originUserData;
        $userAttributes['permissions'] = Auth::user()->permissions;

        session()->put(config('whmcs.session_key'), $userAttributes);

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

    public function getServices(Request $request)
    {
        $state_order = [];
        $states = [];

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

        if ($orders_response['totalresults'] > 0) {
            $total_tickets = $orders_response['totalresults'];
            $orders = $orders_response['products']['product'];
            $orders = collect($orders)->sortByDesc($request->orderby)->values()->all();
            foreach ($states as $state)
                foreach ($orders as $order)
                    $state_order[$state] = [];

            foreach ($states as $state)
                foreach ($orders as $order){
                    if ($order['status'] == $state) {
                        array_push($state_order[$state], $order);
                        
                        $last_index = count($state_order[$state]) - 1;
                        if(strpos($order['groupname'],'Netherlands') !== false){
                            $state_order[$state][$last_index]['flag'] = 'flag-nl';
                        }else{
                            $state_order[$state][$last_index]['flag'] = 'flag-en';
                        }
                        
                        if($state == 'Active'){
                            $page = 0;
                            $reslen = 0;
                            //For Searching
                            $post = array();
                            $post['vpsid'] = $order['customfields']['customfield'][1]['value'];
                            $vps_info = $this->virtualizorAdmin->listvs($page ,$reslen ,$post);
                            $vps_info = $vps_info[$post['vpsid']];
                            $system = explode('-',$vps_info['os_name'])[0];

                        }else{
                            $system = explode('-',$order['configoptions']['configoption'][1]['value'])[0];
                        }

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

        return view('tables/services', compact('states', 'state_order'));
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
                $productGroups[$groupId] = $group_names[2];
            }
        }

        return $productGroups;
        
    }
}
