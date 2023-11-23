<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PersonaController;  
use App\Http\Controllers\API\UsuarioController;  

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1/personas')->group(function () {
 
    Route::get('/',[ PersonaController::class, 'get']);
    Route::post('/',[ PersonaController::class, 'create']);
    Route::get('/{id}',[ PersonaController::class, 'getById']);
    Route::put('/{id}',[ PersonaController::class, 'update']);
    Route::delete('/{id}',[ PersonaController::class, 'delete']);

 });

 


Route::prefix('v1/usuarios')->group(function () {
    // Route::get('/', function () {
    //     return view('welcome');
    // });
    Route::get('/',[ UsuarioController::class, 'get']);
    // Route::post('/',[ PersonaController::class, 'create']);
    // Route::get('/{id}',[ PersonaController::class, 'getById']);
    // Route::put('/{id}',[ PersonaController::class, 'update']);
    // Route::delete('/{id}',[ PersonaController::class, 'delete']);
});