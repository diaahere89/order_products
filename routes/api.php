<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// http://localhost:2202/api/v1/orders/{id}
// universal resource locator 

Route::get('/', function () {
    return response()->json([
        'message' => 'Hello API!',
        'status' => 200,
    ], 200);
});

Route::post('/login', [AuthController::class, 'login']);

// Versioned API routes
Route::prefix('v1')->group(function () {
    require __DIR__.'/api_v1.php';
});