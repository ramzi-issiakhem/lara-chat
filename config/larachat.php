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
    ]


];
