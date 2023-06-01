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
    return Redirect::to('/dashboard');
});

Auth::routes();

Route::group([
    'namespace'=>'App\\Http\\Controllers',
],function(){
    // Here are pages logged in users can visit
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/dashboard/ticketlist', 'HomeController@gettickets');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/balance', 'BalanceController@index')->name('balance');

    Route::get('/create-dedicated-server', 'CreateDedicatedServerController@index')->name('create-dedicated-server');

    Route::get('/create-vps-server', 'CreateVpsServerController@index')->name('create-vps-server');

    Route::get('/overview', 'OverviewController@index')->name('overview');

    Route::get('/servers', 'ServersController@index')->name('servers');

    Route::get('/settings', 'SettingsController@index')->name('settings');

    Route::get('/support-ticket', 'SupportTicketController@index')->name('support-ticket');
    Route::post('/ticket-create', 'SupportTicketController@openticket')->name('ticket.open');

    Route::get('/ticket-detail/{id}', 'TicketDetailController@index')->name('ticket-detail');
    Route::post('/sendReply', 'TicketDetailController@sendReply')->name('sendReply');

    Route::get('/forgot_password', 'ForgotPasswordController@index')->name('forgot_password');
    Route::post('/send_forgot_email', 'ForgotPasswordController@send_forgot_email')->name('send_forgot_email');
});





