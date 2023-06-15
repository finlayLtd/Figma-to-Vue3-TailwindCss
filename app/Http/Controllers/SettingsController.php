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
        return view('pages/settings');
    }

    public function settings_password()
    {
        return view('pages/settings_password');
    }

    public function settings_userManage()
    {
        $users_list = [];
        $check_user_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetClientsDetails',
            'clientid' => Auth::user()->client_id, //The ID of the client the invite is for
        ]);
        if($check_user_response['result'] == 'success'){
            $users_list = $check_user_response['client']['users']['user'];
        }
        return view('pages/settings_userManage',compact('users_list'));
    }

    public function settings_emailHistory()
    {
        $response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetEmails',
            'limitstart' => 0,
            'limitnum' => 30, // Set number of tickets to retrieve per request
            'clientid' => Auth::user()->client_id, // Set number of tickets to retrieve per request
        ]);
        if (count($response['emails']) != 0) {
            $emails = $response['emails']['email'];
        } else $emails = [];
        return view('pages/settings_emailHistory', compact('emails'));
    }


    
    
    
}
