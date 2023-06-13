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

    public function switch(Request $request)
    {
        $originUserData = Auth::user()->originUserData;

        // default system to set the session again!(switch account)
        $userAttributes = [];
        $permissions = ['profile', 'contacts', 'products', 'manageproducts', 'productsso', 'domains', 'managedomains', 'invoices', 'quotes', 'tickets', 'affiliates', 'emails', 'orders'];

        

        $userAttributes = (array) (new \Sburina\Whmcs\Client)->post([
            'action' => 'getClientsDetails',
            'email' => $request->switching_email,
        ]);

        $userAttributes['originUserData'] = $originUserData;
        
       

        $permission_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetUserPermissions',
            'client_id' => $userAttributes['client_id'], //The ID of the client the invite is for
            'user_id' => $userAttributes['originUserData']['id'],
        ]);

        if ($permission_response['result'] == 'success') {
            $permissions = $permission_response['permissions'];
        }

        $userAttributes['permissions'] = $permissions;

        session()->put(config('whmcs.session_key'), $userAttributes);


        return redirect()->route('dashboard');
    }



}
