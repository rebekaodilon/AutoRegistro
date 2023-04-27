<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('empresas', 'App\Http\Controllers\EmpresasController');

    Route::group(['prefix' => 'veiculos'], function () {
        Route::get('/{empresa_id}', 'App\Http\Controllers\VeiculosController@index')->name('veiculos.index');
        Route::get('/create/{empresa_id}', 'App\Http\Controllers\VeiculosController@create')->name('veiculos.create');
        Route::post('/store', 'App\Http\Controllers\VeiculosController@store')->name('veiculos.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\VeiculosController@edit')->name('veiculos.edit');
        Route::put('/update/{id}', 'App\Http\Controllers\VeiculosController@update')->name('veiculos.update');
        Route::delete('/destroy', 'App\Http\Controllers\VeiculosController@destroy')->name('veiculos.destroy');
    });

    Route::group(['prefix' => 'multas'], function () {
        Route::get('/{veiculo_id}', 'App\Http\Controllers\MultasController@index')->name('multas.index');
        Route::get('/create/{veiculo_id}', 'App\Http\Controllers\MultasController@create')->name('multas.create');
        Route::post('/store', 'App\Http\Controllers\MultasController@store')->name('multas.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\MultasController@edit')->name('multas.edit');
        Route::put('/update/{id}', 'App\Http\Controllers\MultasController@update')->name('multas.update');
        Route::delete('/destroy', 'App\Http\Controllers\MultasController@destroy')->name('multas.destroy');
    });
    

});

require __DIR__.'/auth.php';
