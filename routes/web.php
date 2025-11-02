<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});


Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout']);
Route::get('home', [HomeController::class, 'index']);
Route::get('relationship', [HomeController::class, 'relationship']);

Route::prefix('contact')->group(function(){
    Route::controller(ContactController::class)->group(function(){
        Route::get('list' , 'index');
        Route::get('create' , 'create');
        Route::post('store' , 'store');
        Route::get('edit/{id}' , 'edit');
        Route::post('update/{id}' , 'update');
        Route::get('delete/{id}' , 'destroy');
        Route::get('otp/send/{id}' , 'otpSend')->name('otp.send');
    });
});