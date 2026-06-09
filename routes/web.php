<?php

use Illuminate\Support\Facades\Route;
use Modules\SocialTwitter\Http\Controllers\SocialTwitterController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('socialtwitters', SocialTwitterController::class)->names('socialtwitter');
});
