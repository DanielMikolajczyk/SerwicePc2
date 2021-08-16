<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Models\Client;
use App\Models\ClientType;

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

Route::get('/test', function(){
  $clients = Client::with('clientType')->get();
  foreach($clients as $client){
    echo $client->clientType->id . '</br>';
  }
});

Route::get('/', function () {
    return view('web/layouts/master');
});