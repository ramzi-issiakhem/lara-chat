<?php

use Illuminate\Support\Facades\Route;
use Ramzi\LaraChat\Http\Controllers\FeedController;


Route::group([
    "middleware" => config('larachat.api.global_middlewares',[]),
    "prefix" => config('larachat.api.base_path','api/larachat'),
    "namespace" => "Ramzi\LaraChat\Http\Controllers",
], function () {

    Route::middleware(["check-feed-owner-access"])->group(function () {
        Route::get('feed/{feedOwnerModelId}', FeedController::class);
    });


});
