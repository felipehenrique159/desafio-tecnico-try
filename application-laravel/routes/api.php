<?php

use App\Http\Controllers\VendasController;
use App\Http\Controllers\VendedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('vendedor')->group(function () {
    Route::controller(VendedorController::class)->group(function () {
        Route::post('/', 'criarVendedor');
        Route::get('/', 'listarTodosComComissao');
    });
});

Route::prefix('vendas')->group(function () {
    Route::controller(VendasController::class)->group(function () {
        Route::post('/', 'criarVenda');
        Route::get('/vendedor', 'listarVendasPorVendedor');
    });
});