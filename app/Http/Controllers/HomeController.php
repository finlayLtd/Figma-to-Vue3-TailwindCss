<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use sburina\Whmcs;
use App\Enduser;

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
        $total_tickets = 0;
        $tickets = [];
        $products = [];
        $states = [];
        $state_order = [];
        $tickets_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetTickets',
            'limitstart' => 0,
            'limitnum' => 10, // Set number of tickets to retrieve per request
            'clientid' => Auth::user()->client_id, // Set number of tickets to retrieve per request
        ]);

        $order_state_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetOrderStatuses',
        ]);
        
        foreach($order_state_response['statuses']['status'] as $state_info)
            array_push($states,$state_info['title']);
        asort($states);

        $orders_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetOrders',
            'limitstart' => 0,
            'limitnum' => 10, // Set number of tickets to retrieve per request
            'userid' => Auth::user()->client_id, // Set number of tickets to retrieve per request
        ]);

        // $products_response = (new \Sburina\Whmcs\Client)->post([
        //     'action' => 'GetProducts',
        // ]);
        
        // if ($products_response['totalresults'] > 0) {
        //     foreach ($products_response['products']['product'] as $key => $product) {
        //         // unset($products_response['products']['product'][$key]['pricing']);
        //         // unset($products_response['products']['product'][$key]['configoptions']);
        //     }
        //    // print_r($products_response['products']['product']);exit;
        //     $products = $products_response['products']['product'];
        // }
        // print_r($products);exit;
        if ($orders_response['totalresults'] > 0) {
            $total_tickets = $orders_response['totalresults'];
            $orders = $orders_response['orders']['order'];

            foreach($states as $state)
                foreach($orders as $order)
                    $state_order[$state] = [];
        
            foreach($states as $state)
                foreach($orders as $order)
                    if($order['status'] == $state) array_push($state_order[$state],$order);
        }
        
        

        if ($tickets_response['totalresults'] > 0) {
            $total_tickets = $tickets_response['totalresults'];
            $tickets = $tickets_response['tickets']['ticket'];
        }
        // $this->getVPSList();
        return view('pages/dashboard', compact('tickets', 'total_tickets', 'states','state_order'));
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

    private function getVPSList(){
        $key =  'N8q5PHMfwvMQHMHYkytYtTydVWoLsWNC';
        $pass = 'CcuJEN365CusfakK2NA8uVGSg0e8e36J';
        $ip = '37.59.33.165';
        
        
        $v = new Enduser($ip, $key, $pass);

        $vps = $v->listvs();
        
        print_r($vps);exit;
        // return $vmList;
    }
}
