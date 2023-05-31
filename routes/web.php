<?php

use Illuminate\Support\Facades\Route;
use sburina\Whmcs;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::group([
    'namespace'=>'App\\Http\\Controllers',
],function(){
    // Here are pages logged in users can visit
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/balance', 'BalanceController@index')->name('balance');
    Route::get('/create-dedicated-server', 'CreateDedicatedServerController@index')->name('create-dedicated-server');
    Route::get('/create-vps-server', 'CreateVpsServerController@index')->name('create-vps-server');
    Route::get('/overview', 'OverviewController@index')->name('overview');
    Route::get('/servers', 'ServersController@index')->name('servers');
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::get('/support-ticket', 'SupportTicketController@index')->name('support-ticket');
    Route::get('/ticket-detail', 'SupportTicketController@index')->name('ticket-detail');
    Route::post('/ticket-create', 'SupportTicketController@openticket')->name('ticket.open');
});





