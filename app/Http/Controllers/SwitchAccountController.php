<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use sburina\Whmcs;

class SwitchAccountController extends Controller
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
        $originUserData = Auth::user()->originUserData;

        $clients = [];

        foreach ($originUserData['clients'] as $client) {
            $temp_response = (new \Sburina\Whmcs\Client)->post([
                'action' => 'GetClientsDetails',
                'clientid' => $client['id'], //The ID of the client the invite is for
            ]);
            if($temp_response['result'] == 'success'){
                $user_instance = $temp_response['client'];
                array_push($clients, $user_instance);
            }
        }

        return view('pages/switch-account',compact('clients','originUserData'));
    }

}
