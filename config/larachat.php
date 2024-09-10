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
         * The Middleware used to wrap all the API, can be set as a empty array.
         */
        "global_middlewares" => []
    ],

    /*
     * The different types of Feeds available on the App ( Only one version for the V1 )
     */
    "feeds" => [

        "user_feed" => [
            // The Model that will host this type of feed
            "feed_model" => User::class,

            // The Model that interacts with the messages and the threads
            "messageable_model" => User::class,

             // Config of the Messages used in the Threads Feed
            "messages" => [

            ]
        ]

    ]

];
