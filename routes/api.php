<?php

use Illuminate\Support\Facades\Route;
use Ramzi\LaraChat\Http\Controllers\FeedController;
use Ramzi\LaraChat\Http\Controllers\Thread\ThreadController;
use Ramzi\LaraChat\Http\Controllers\Thread\ThreadInvitationController;
use Ramzi\LaraChat\Http\Controllers\Thread\ThreadMessageController;
use Ramzi\LaraChat\Http\Controllers\Thread\ThreadParticipantController;


Route::group([
    "middleware" => config('larachat.api.global_middlewares',[]),
    "prefix" => config('larachat.api.base_path','api/larachat'),
    "namespace" => "Ramzi\LaraChat\Http\Controllers",
], function () {

    Route::prefix("feed/{feed_owner}")->middleware(["can_access_feed"])->group(function () {

        Route::get('', FeedController::class);


        Route::prefix("threads")->middleware([])->group(function () {
            Route::get('', [ThreadController::class, 'index']);
            Route::post('', [ThreadController::class, 'store']);


            Route::prefix("{thread}")->group(function () {

                // Thread Message Routes
                Route::get("messages", [ThreadMessageController::class, 'index']);
                Route::post("messages", [ThreadMessageController::class, 'store']);
                Route::put("messages/{message}", [ThreadMessageController::class, 'put']);
                Route::delete("messages/{message}", [ThreadMessageController::class, 'destroy']);

                // Thread Participant Routes
                Route::post('participants', [ThreadParticipantController::class, 'store']);
                Route::delete('participants', [ThreadParticipantController::class, 'destroy']);

                // Thread Invitation Routes
                Route::post('invitations', [ThreadInvitationController::class, 'store']);
                Route::delete('invitations', [ThreadInvitationController::class, 'destroy']);
                Route::get('invitations/{invitation_code}', [ThreadInvitationController::class, 'show']);

                //Thread Seen Activity Routes
                Route::get('seens', [ThreadSeenController::class, 'index']);
                Route::put('seens/{user}', [ThreadSeenController::class, 'update']);

            });

        });
    });


});
