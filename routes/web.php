<?php

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
    Route::put('/dashboard/edit/{room}', [RoomController::class, 'update']);
    Route::post('/dashboard/add', [RoomController::class, 'store']);
    Route::delete('/dashboard/delete/{room}', [RoomController::class, 'destroy']);

});
require __DIR__.'/auth.php';
