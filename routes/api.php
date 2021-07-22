<?php

use App\Http\Controllers\CorredoresController;
use App\Http\Controllers\ProvasController;
use App\Http\Controllers\ResultadosCorredoresController;
use App\Models\ResultadosCorredores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('corredores', CorredoresController::class);
Route::resource('provas', ProvasController::class);
Route::resource('resultados', ResultadosCorredoresController::class);
Route::get('resultados-idade', [ResultadosCorredoresController::class,'listarResultadosFiltroIdade']);
