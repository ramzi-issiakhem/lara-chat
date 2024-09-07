<?php

namespace Ramzi\LaraChat\Facades;

class LaraChatManager
{

    /**
     * Verify if the migrations should be run by defalut when executing artisan migration command
     * @return bool
     */
    public static function shouldRunMigrations(): bool {
        return config("larachat.auto_migrate",false);
    }

    /**
     * Verify if the API is exposed and used.
     * @return bool
     */
    public static function isApiExposed() : bool {
        return config("larachat.api.expose",true);
    }

}
