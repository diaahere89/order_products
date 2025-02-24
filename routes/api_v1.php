<?php

use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// http://localhost:2202/api/v1/orders/{id}
// universal resource locator 

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('orders', OrderController::class)->except( ['update'] );
    Route::put('orders/{order}', [ OrderController::class, 'replace' ]);
    Route::patch('orders/{order}', [ OrderController::class, 'update' ]);

    Route::get('products', [ ProductController::class, 'index' ]);
});

//Route::apiResource('orders', OrderController::class);