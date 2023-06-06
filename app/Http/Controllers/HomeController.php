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
        $tickets_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetTickets',
            'limitstart' => 0,
            'limitnum' => 10, // Set number of tickets to retrieve per request
            'clientid' => Auth::user()->client_id, // Set number of tickets to retrieve per request
        ]);

        if ($tickets_response['totalresults'] > 0) {
            $total_tickets = $tickets_response['totalresults'];
            $tickets = $tickets_response['tickets']['ticket'];
        }
        $this->getVPSList();
        return view('pages/dashboard', compact('tickets', 'total_tickets'));
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
            'email' => 'hiraisin424@gmail.com',
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
