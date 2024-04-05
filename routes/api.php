<?php

use App\Http\Controllers\Api\ApiV1Controller;
use App\Http\Controllers\Api\v1\DeveloperApiV1Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('v1')->name('api.v1.')->group(function () {
    Route::post('/developer', [ApiV1Controller::class, 'getDevelopers'])->name('developer');
    Route::post('/site', [ApiV1Controller::class, 'getDevelopers'])->name('site');
});
