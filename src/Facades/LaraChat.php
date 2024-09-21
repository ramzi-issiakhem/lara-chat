<?php

namespace Ramzi\LaraChat\Facades;

use Illuminate\Support\Facades\Facade;


/**
 * The LaraChat Facade
 * @method static bool shouldRunMigrations()
 * @method static bool isApiExposed()
 * @method static string getSenderModel()
 * @method static string getSenderModelTable()
 * @method static string getFeedOwnerModel()
 * @method static string getFeedOwnerModelTable()
 *
 */
class LaraChat extends Facade
{


    /**
     * Get the registered name of the component.
     * @return string
     */
    public static function getFacadeAccessor() : string {
        return 'larachat-manager';
    }

}
