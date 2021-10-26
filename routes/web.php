<?php

require __DIR__.'/auth.php';

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientTypeController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\OrderTypeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DiagnoseController;
use App\Http\Controllers\AccessoryController;
use Illuminate\Support\Facades\Route;

Route::get('/test', [App\Http\Controllers\TestController::class, 'test']);
Route::post('/test', [App\Http\Controllers\TestController::class, 'testPost'])->name('post');

Route::middleware(['auth'])->group(function () {

  Route::get('order/{order}/correct', [OrderController::class,'correct'])->name('order.correct');
  Route::resource('order', OrderController::class);
  Route::resource('ordertype', OrderTypeController::class);
  Route::resource('orderstatus', OrderStatusController::class);
  Route::resource('client', ClientController::class);
  Route::resource('clienttype', ClientTypeController::class);
  Route::resource('departament', DepartamentController::class);  
  Route::resource('role', RoleController::class);
  Route::resource('permission', PermissionController::class);
  Route::resource('diagnose', DiagnoseController::class);
  Route::resource('accessory', AccessoryController::class)->except(['create,store']);
  
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');
