<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// http://localhost:2202/api/v1/orders/{id}
// universal resource locator 

Route::apiResource('orders', \App\Http\Controllers\Api\V1\OrderController::class);