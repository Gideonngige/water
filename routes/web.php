<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WaterController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('home', [WaterController::class,'home'])->name('home');
Route::get('bill', [WaterController::class,'bill'])->name('bill');
Route::post('bill', [WaterController::class,'paybill'])->name('paybill');
Route::post('register', [WaterController::class,'register'])->name('register');
Route::get('register', [WaterController::class,'registerget'])->name('register');
Route::post('login', [WaterController::class,'login'])->name('login');
Route::get('login', [WaterController::class,'loginget'])->name('login');
Route::get('messages', [WaterController::class,'messages'])->name('messages');
Route::get('admin', [WaterController::class,'admin'])->name('admin');
Route::post('admin', [WaterController::class,'adminpost'])->name('adminpost');



Route::get('send-email', [EmailController::class,'sendemail'])->name('send-email');
Route::controller(PaymentController::class)->prefix('payments')->as('payments')->group(function(){
    Route::get('/token', 'token')->name('token');
    Route::get('/initiatepush', 'initiateStkPush')->name('initiatepush');
});