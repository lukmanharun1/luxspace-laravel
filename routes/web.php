<?php

use App\Http\Controllers\AjaxRoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
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

// halaman utama
Route::get('/', function () {
    return view('index');
});

// details
Route::get('/details', function () {
    return view('details');
});

// add to cart
Route::get('/cart', function () {
    return view('cart');
});

// halaman sukses -> shipping details
Route::get('/success', function () {
    return view('success');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [RoomController::class, 'index']);
    Route::get('/dashboard/add', [RoomController::class, 'create']);
    Route::get('/dashboard/edit/{room}', [RoomController::class, 'edit']);
    Route::get('/dashboard/details/{room}', [RoomController::class, 'show']);
    Route::put('/dashboard/edit/{room}', [RoomController::class, 'update']);
    Route::post('/dashboard/add', [RoomController::class, 'store']);
    Route::delete('/dashboard/delete/{room}', [RoomController::class, 'destroy']);

    // ajax
    Route::get('/dashboard/ajax/all-data-rooms', [AjaxRoomController::class, 'index']);
    Route::get('/dashboard/ajax/{room:category}', [AjaxRoomController::class, 'show']);

});
require __DIR__.'/auth.php';
