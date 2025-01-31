<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ContactosController;
use GuzzleHttp\Promise\Create;

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

Route::post('/registro', [UsersController::class, "registro"])->middleware('api');
Route::post('/login', [UsersController::class, "login"])->middleware('api');
Route::post('/contactos/crear', [ContactosController::class, 'create'])->middleware('api');
Route::get('/contactos', [ContactosController::class, 'getAll'])->middleware('api');