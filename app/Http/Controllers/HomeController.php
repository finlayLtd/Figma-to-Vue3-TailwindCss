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
        $products = array();
        $departments = array();
        $tickets = array();
        $status = array();
        $tickets_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetTickets',
            'limitstart' => 0,
            'limitnum' => 10, // Set number of tickets to retrieve per request
            'clientid' => Auth::user()->client_id, // Set number of tickets to retrieve per request
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
        if($product_info['totalresults'] > 0){
            $products = $product_info['products']['product'];
        }

        if($departments_info['totalresults'] > 0){
            $departments = $departments_info['departments']['department'];
        }

        if($tickets_response['totalresults'] > 0){
            $tickets = $tickets_response['tickets']['ticket'];
        }

        if($tickets_status['totalresults'] > 0){
            $status = $tickets_status['statuses']['status'];
        }
        
        return view('pages/dashboard',compact('tickets','status','departments','products'));
    }
}
