<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DishesController;


Route::controller(OrderController::class)->group(function() {
    Route::get('/', 'index')->name('order.form');
    Route::post('order_submit', 'submit')->name('order.submit');
    Route::get('order/{order}/serve', 'serve');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false,
    'verify' => false,
    'confirm' => false
]);

Route::resource('/dish', DishesController::class);

Route::controller(DishesController::class)->group(function() {
    Route::get('order', 'order')->name('kitchen.order');
    Route::get('order/{order}/approve', 'approve');
    Route::get('order/{order}/cancel', 'cancel');
    Route::get('order/{order}/ready', 'ready');    
});

