<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Competition\App\Http\Controllers\CompetitionController;

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

Route::prefix('v1/competition')->group(function(){
    Route::get('index', [CompetitionController::class,'index']);
    Route::get('show/{id}', [CompetitionController::class,'show']);
    Route::get('match/{id}', [CompetitionController::class,'match']);
});
