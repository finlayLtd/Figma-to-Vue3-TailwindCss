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
        $orders = array();
        $departments = array();
        $tickets = array();
        $status = array();
        $tickets_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetTickets',
            'clientid' => Auth::user()->client_id, // Set number of tickets to retrieve per request
        ]);

        $tickets_status = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetSupportStatuses'
        ]);

        $order_info =  (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetOrders',
            'userid' => Auth::user()->client_id,
        ]);

        $departments_info =  (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetSupportDepartments'
        ]);
        if ($order_info['totalresults'] > 0) {
            $orders = $order_info['orders']['order'];
        }

        if ($departments_info['totalresults'] > 0) {
            $departments = $departments_info['departments']['department'];
        }


        if ($tickets_response['totalresults'] > 0) {
            $tickets = $tickets_response['tickets']['ticket'];
        }

        if ($tickets_status['totalresults'] > 0) {
            $status = $tickets_status['statuses']['status'];
        }

        return view('pages/support-ticket', compact('tickets', 'status', 'departments', 'orders'));
    }

    public function supportlist(Request $request)
    {
        // 'orderby' => $request->orderby,
        // 'order' => $request->order,
        $orders = array();
        $departments = array();
        $tickets = array();
        $status = array();
        $tickets_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetTickets',

            'clientid' => Auth::user()->client_id, // Set number of tickets to retrieve per request
        ]);

        $tickets_status = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetSupportStatuses'
        ]);

        $order_info =  (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetOrders',
            'userid' => Auth::user()->client_id,
        ]);

        $departments_info =  (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetSupportDepartments'
        ]);
        if ($order_info['totalresults'] > 0) {
            $orders = $order_info['orders']['order'];
        }

        if ($departments_info['totalresults'] > 0) {
            $departments = $departments_info['departments']['department'];
        }


        if ($tickets_response['totalresults'] > 0) {
            $tickets = $tickets_response['tickets']['ticket'];
            if($request->order == 'desc') $tickets = collect($tickets)->sortByDesc($request->orderby)->values()->all();
            else  $tickets = collect($tickets)->sortBy($request->orderby)->values()->all();
            
        }

        if ($tickets_status['totalresults'] > 0) {
            $status = $tickets_status['statuses']['status'];
        }

        return view('tables/supporttable', compact('tickets', 'status', 'departments', 'orders'));
    }

    public function openticket(Request $request)
    {
        if ($request->message) {
            $message = $request->message;
        } else $message = ' ';

        $action_command_array = array(
            'action' => 'OpenTicket',
            'deptid' => $request->department,
            'subject' => $request->subject,
            'message' => $message,
            'clientid' => Auth::user()->client_id
        );
        if ($request->service != 0) $action_command_array['serviceid'] = $request->service;

        $created_ticket_info =  (new \Sburina\Whmcs\Client)->post($action_command_array);

        return redirect()->route('support-ticket');
    }
}
