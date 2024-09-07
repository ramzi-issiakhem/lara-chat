<?php

use Illuminate\Support\Facades\Route;



Route::group([
    "middleware" => config('larachat.api.global_middlewares',[]),
    "prefix" => config('larachat.api.base_path','api/larachat'),
    "namespace" => "Ramzi\LaraChat\Http\Controllers",
], function () {


});
