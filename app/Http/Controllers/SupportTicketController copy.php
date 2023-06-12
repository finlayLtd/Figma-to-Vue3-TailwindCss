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
        

        return view('pages/switch-account');
    }

}
