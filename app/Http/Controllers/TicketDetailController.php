<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class TicketDetailController extends Controller
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
    public function index(Request $request)
    {
        $ticket_id  = $request->id;

        $ticket_detail = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetTicket',
            'ticketid' => $ticket_id,
        ]);

        return view('pages/ticket-detail', compact('ticket_id','ticket_detail'));
    }

    public function sendReply(Request $request)
    {

        $ticket_id = $request->ticket_id;
        $clientid = Auth::user()->client_id;
        if($request->message){
            $message = $request->message;
        } else $message = ' ';

        if($request->file){
            $addTicketReply = (new \Sburina\Whmcs\Client)->post([
                'action' => 'AddTicketReply',
                'ticketid' => $ticket_id,
                'clientid' => $clientid,
                'message' => $message,
                'attachments' => base64_encode(json_encode([['name' => $request->file('file')->getClientOriginalName(), 'data' => base64_encode(file_get_contents($request->file))]])),
            ]);
        } else{
            $addTicketReply = (new \Sburina\Whmcs\Client)->post([
                'action' => 'AddTicketReply',
                'ticketid' => $ticket_id,
                'clientid' => $clientid,
                'message' => $message,
            ]);
        }

        $ticket_detail = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetTicket',
            'ticketid' => $ticket_id,
        ]);

        return redirect()->route('ticket-detail', ['id' => $ticket_id]);
        
    }

    
}
