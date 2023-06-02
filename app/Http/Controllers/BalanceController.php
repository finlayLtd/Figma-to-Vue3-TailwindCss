<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use sburina\Whmcs;

class BalanceController extends Controller
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
        $response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetInvoices',
            // 'limitstart' => $offset,
            // 'limitnum' => 10, // Set number of tickets to retrieve per request
            'userid' => Auth::user()->client_id, // Set number of tickets to retrieve per request
            'orderby' => 'invoicenumber'
        ]);
        $invoices = $response['invoices']['invoice'];
        return view('pages/balance',compact('invoices'));
    }
}
