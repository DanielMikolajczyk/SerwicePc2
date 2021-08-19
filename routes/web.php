<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClientController;
use App\Models\Client;
use App\Models\ClientType;
use App\Models\Order;

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

Route::resource('order', OrderController::class);
Route::resource('client', ClientController::class);

Route::get('/test', function(){
  return Order::where('client_id', 1)->get();
  // return Order::where('client_id', 1)->delete();
});

Route::get('/', function () {
    return view('web/layouts/master');
});