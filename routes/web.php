<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'admin'], function () {
    Route::get('/home', [DashboardController::class, 'home'])->name('name');
});

//ticket app rote start
Route::get('/create', [TripController::class, 'create'])->name('create');
Route::post('/create/store', [TripController::class, 'create_store'])->name('create.store');
Route::post('/destination', [TripController::class, 'destination'])->name('destination');
Route::get('/sel/{trip_id}', [TripController::class, 'sel'])->name('sel');
Route::post('/sale/store', [TicketController::class, 'sale_store'])->name('sale.store');
Route::get('/confirmed/{trip_id}', [TicketController::class, 'confirmed'])->name('confirmed');
Route::post('/buy/ticket', [TicketController::class, 'buy_ticket'])->name('buy.ticket');
Route::get('/success', [TicketController::class, 'success'])->name('success');