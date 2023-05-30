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

Route::get('/hello', function () {
    // $data = \Whmcs::GetClientsDetails([
    //     'email' => 'hiraisin424@gmail.com'
    // ]);

    $whmcs = app('whmcs');
    $data = $whmcs->GetClientsProducts([
        'clientid' => 1
    ]);
    var_dump(json_encode($data)); exit();
});

Route::get('/test', function () {
    return view('pages/balance');
});




Auth::routes();
// Here are pages logged in users can visit
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/balance', [App\Http\Controllers\BalanceController::class, 'index'])->name('balance');
Route::get('/create-dedicated-server', [App\Http\Controllers\CreateDedicatedServerController::class, 'index'])->name('create-dedicated-server');
Route::get('/create-vps-server', [App\Http\Controllers\CreateVpsServerController::class, 'index'])->name('create-vps-server');
Route::get('/overview', [App\Http\Controllers\OverviewController::class, 'index'])->name('overview');
Route::get('/servers', [App\Http\Controllers\ServersController::class, 'index'])->name('servers');
Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
Route::get('/support-ticket', [App\Http\Controllers\SupportTicketController::class, 'index'])->name('support-ticket');
Route::get('/ticket-detail', [App\Http\Controllers\SupportTicketController::class, 'index'])->name('ticket-detail');




