<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/settings/change', [SettingController::class, 'changeSetting']);
Route::post('/settings/confirm', [SettingController::class, 'confirmSetting']);
