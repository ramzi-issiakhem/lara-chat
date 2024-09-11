<?php

use Illuminate\Support\Facades\Route;



Route::group([
    "middleware" => config('larachat.api.global_middlewares',[]),
    "prefix" => config('larachat.api.base_path','api/larachat'),
    "namespace" => "Ramzi\LaraChat\Http\Controllers",
], function () {

    //Feed Related Routes
    Route::get('feeds/{feed_name}');

    Route::prefix('feeds/{feed}/threads')->group(function () {

        //Threads Related Routes
        Route::get('/');
        Route::get('{thread}');
        Route::post('/');
        Route::delete('thread}');
        Route::put('{thread}');

        // Participants Related Routes
        Route::get('{thread}/participants');
        Route::post('{thread}/participants');
        Route::delete('{thread}/participants/{participant}');

        // Thread Seen Related Routes
        Route::get('{thread}/views');
        Route::post('{thread}/read');

        //Messages Related Routes
        Route::get('{thread}/messages');
        Route::put('{thread}/messages/{message}');
        Route::post('{thread}/messages');
        Route::delete('{thread}/messages/{message}');

        //Reactions Related Routes
        Route::get('{thread}/messages/{message}/reactions');
        Route::post('{thread}/messages/{message}/reactions');
        Route::delete('{thread}/messages/{message}/reactions');
        Route::delete('{thread}/messages/{message}/reactions/{reaction}');
    });


    //Thread Seen Related Routes

});
