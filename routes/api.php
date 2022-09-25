<?php

use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\WorkController;
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

Route::post('/import/excel', [ImportExcelController::class, 'import']);
Route::get('/statistic', [StatisticController::class, 'index']);
Route::apiResource('works', WorkController::class);
