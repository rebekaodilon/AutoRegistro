<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EmpresaApiController as EmpresaApiController;
use App\Http\Controllers\API\AuthController as AuthController;
use App\Http\Controllers\API\MultaApiController as MultaApiController;
use App\Http\Controllers\API\VeiculoApiController as VeiculoApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::group(['prefix' => 'empresas'], function() {
        Route::get('/', [EmpresaApiController::class, 'index']);
        Route::get('/{id}', [EmpresaApiController::class, 'show']);
        Route::get('/veiculos/{empresa_id}', [EmpresaApiController::class, 'veiculos']);
    });
    Route::group(['prefix' => 'veiculos'], function() {
        Route::get('/', [VeiculoApiController::class, 'index']);
        Route::get('/multas', [VeiculoApiController::class, 'multas']);
    });
    Route::group(['prefix' => 'multas'], function() {
        Route::get('/', [MultaApiController::class, 'index']);        
    });
});
