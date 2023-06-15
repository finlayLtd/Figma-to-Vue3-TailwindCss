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
            'orderby' => 'date',
            'order' => 'desc',
            // 'limitstart' => $offset,
            // 'limitnum' => 10, // Set number of tickets to retrieve per request
            'userid' => Auth::user()->client_id, // Set number of tickets to retrieve per request
        ]);
        if (count($response['invoices']) != 0) {
            $invoices = $response['invoices']['invoice'];
        } else $invoices = [];
        return view('pages/balance', compact('invoices'));
    }

    public function invoiceDetail(Request $request)
    {
        $invoice_id  = $request->id;

        $invoice_detail = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetInvoice',
            'invoiceid' => $invoice_id,
        ]);

        return view('pages/invoice-detail', compact('invoice_id','invoice_detail'));
    }

    
}
