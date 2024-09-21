<?php

use App\Models\User;

return [

    /*
     *  Should the migrations run when you execute the artisan migrate command,
     *  If so, set it to true
     */
    "auto_migrate" => true,

    /*
     * The config related to the API exposed by Larachat.
     */
    "api" => [
        /*
         *  Is the Larachat's API needed in your Laravel Project
         */
        "expose" => true,

        /*
         * The Default API Base path that will prefix any routes used by Larachat.
         */
        "base_path" => "/api/larachat",

        /*
         * The Middleware used to wrap all the API, can be set as an empty array.
         */
        "global_middlewares" => ['auth']
    ],


    /*
     * The Model that will send the Messages in the Thread. ( Only one in V1 ).
     */
    "message_sender_model" => User::class,

    /*
     * The Model that will have access to his Feed that contains the threads he's part of ( Only one in V1 ).
     */
    "feed_owner_model" => User::class,

    /*
     *  Should the Feed be created automatically when the feed is not found.
     */
    "auto_create_feed" => true,



];
