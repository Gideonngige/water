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
Route::get('register', [WaterController::class,'register'])->name('register');


Route::get('send-email', [EmailController::class,'sendemail'])->name('send-email');
Route::controller(PaymentController::class)->prefix('payments')->as('payments')->group(function(){
    Route::get('/token', 'token')->name('token');
    Route::get('/initiatepush', 'initiateStkPush')->name('initiatepush');
});