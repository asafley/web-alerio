<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::prefix('v1')->group(function () {
    route::prefix('admin')->group(function () {
        Route::apiResource('posts', PostController::class);
        Route::apiResource('contacts', \App\Http\Controllers\ContactController::class);
        Route::apiResource('industries', \App\Http\Controllers\IndustryController::class);
    });
});
