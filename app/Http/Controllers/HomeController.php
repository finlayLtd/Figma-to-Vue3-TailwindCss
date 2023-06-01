<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use sburina\Whmcs;

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
        $tickets_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetTickets',
            'limitstart' => 0,
            'limitnum' => 10, // Set number of tickets to retrieve per request
            'clientid' => Auth::user()->client_id, // Set number of tickets to retrieve per request
        ]);

        if($tickets_response['totalresults'] > 0){
            $total_tickets = $tickets_response['totalresults'];
            $tickets = $tickets_response['tickets']['ticket'];
        }
        
        return view('pages/dashboard',compact('tickets','total_tickets'));
    }
}
