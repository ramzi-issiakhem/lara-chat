<?php

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
             // Config of the Messages used in the Threads Feed
            "messages" => [
                // The Model that interacts with the messages
                "messageable_model" => App\Models\User::class,
            ]
        ]

    ]

];
