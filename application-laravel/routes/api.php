<?php

use App\Http\Controllers\VendedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('vendedor')->group(function () {
    Route::controller(VendedorController::class)->group(function () {
        Route::post('/', 'criar');
    });
});