<?php

use App\Http\Controllers\api\v1\TenderController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Аутентификация
Route::post('login', [AuthController::class, 'login']);


Route::group(['middleware' => ['auth:api']], function () {
    Route::apiResource('tender', TenderController::class)->only([
        'index', 'show', 'store'
    ]);

    Route::post('tender/import', [TenderController::class, 'import']);
    Route::post('tender/create', [TenderController::class, 'create']);
});
