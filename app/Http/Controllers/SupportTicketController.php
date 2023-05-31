<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use sburina\Whmcs;

class SupportTicketController extends Controller
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
        $tickets_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetTickets',
            'limitstart' => 0,
            'limitnum' => 10, // Set number of tickets to retrieve per request
        ]);

        $tickets_status = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetSupportStatuses'
        ]);
        
        $product_info =  (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetProducts'
        ]);

        $departments_info =  (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetSupportDepartments'
        ]);
        
        $products = $product_info['products']['product'];
        
        $departments = $departments_info['departments']['department'];
        
        $tickets = $tickets_response['tickets']['ticket'];

        $status = $tickets_status['statuses']['status'];
        return view('pages/support-ticket',compact('tickets','status','departments','products'));
    }

    public function openticket(){

    }
}
