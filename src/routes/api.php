<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TodosController;

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

Route::get('/index', [TodosController::class, 'index']);
Route::post('/add', [TodosController::class, 'add']);
Route::post('/remove', [TodosController::class, 'remove']);
Route::post('/removeAll', [TodosController::class, 'removeAll']);
Route::post('/doneAll', [TodosController::class, 'doneAll']);