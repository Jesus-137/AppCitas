<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactosController;

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

Route::post('/registro', [ContactosController::class, "registro"])->middleware('api');
Route::post('/login', [ContactosController::class, "login"])->middleware('api');