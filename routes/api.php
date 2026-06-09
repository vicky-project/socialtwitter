<?php

use Illuminate\Support\Facades\Route;
use Modules\SocialTwitter\Http\Controllers\SocialTwitterController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('socialtwitters', SocialTwitterController::class)->names('socialtwitter');
});
