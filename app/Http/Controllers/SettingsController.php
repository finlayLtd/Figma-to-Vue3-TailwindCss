<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use sburina\Whmcs;

class SettingsController extends Controller
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
            'action' => 'GetEmails',
            // 'limitstart' => $offset,
            // 'limitnum' => 10, // Set number of tickets to retrieve per request
            'clientid' => Auth::user()->client_id, // Set number of tickets to retrieve per request
        ]);
        if (count($response['emails']) != 0) {
            $emails = $response['emails']['email'];
        } else $emails = [];
        return view('pages/settings', compact('emails'));
    }
}
