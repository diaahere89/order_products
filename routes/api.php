<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/', function () {
    return response()->json([
        'message' => 'Hello API!',
        'status' => 200,
    ], 200);
});

Route::post('/login', [AuthController::class, 'login']);