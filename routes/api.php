<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamInfoController;
use App\Http\Controllers\GameResultController;

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

Route::get('/teams', TeamController::class . '@index');
Route::apiResource('/teams/{team}/info', TeamInfoController::class)->only(['store', 'update']);
Route::post('/game-result', GameResultController::class . '@store');
