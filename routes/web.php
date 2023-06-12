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
    'namespace' => 'App\\Http\\Controllers',
], function () {
    // Here are pages logged in users can visit
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/dashboard/ticketlist', 'HomeController@gettickets');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/balance', 'BalanceController@index')->name('balance');

    Route::get('/create-dedicated-server', 'CreateDedicatedServerController@index')->name('create-dedicated-server');

    Route::get('/create-vps-server', 'CreateVpsServerController@index')->name('create-vps-server');

    Route::get('/overview/{vps_id}', 'OverviewController@index')->name('overview');

    Route::get('/servers', 'ServersController@index')->name('servers');

    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::get('/settings_password', 'SettingsController@settings_password')->name('settings_password');
    Route::get('/settings_userManage', 'SettingsController@settings_userManage')->name('settings_userManage');
    Route::get('/settings_emailHistory', 'SettingsController@settings_emailHistory')->name('settings_emailHistory');

    
    

    Route::get('/support-ticket', 'SupportTicketController@index')->name('support-ticket');
    Route::get('/switch-account', 'SwitchAccountController@index')->name('switch-account');

    Route::post('/ticket-create', 'SupportTicketController@openticket')->name('ticket.open');

    Route::get('/ticket-detail/{id}', 'TicketDetailController@index')->name('ticket-detail');
    Route::post('/sendReply', 'TicketDetailController@sendReply')->name('sendReply');

    Route::get('/forgot_password', 'ForgotPasswordController@index')->name('forgot_password');
    Route::post('/send_forgot_email', 'ForgotPasswordController@send_forgot_email')->name('send_forgot_email');
    Route::post('/change_name', 'HomeController@change_name')->name('change_name');
    Route::post('/change_password', 'HomeController@change_password')->name('change_password');
    Route::post('/invite_user', 'HomeController@invite_user')->name('invite_user');
    Route::post('/remove_access', 'HomeController@remove_access')->name('remove_access');
    
    Route::get('/manageUser-detail/{id}/{email}', 'HomeController@managePermissions')->name('manageUser-detail');
    Route::post('/edit_user_permissions', 'HomeController@edit_user_permissions')->name('edit_user_permissions');
    
});
