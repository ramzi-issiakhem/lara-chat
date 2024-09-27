<?php

namespace Ramzi\LaraChat\Facades;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;


/**
 * The LaraChat Facade
 * @method static bool shouldRunMigrations()
 * @method static bool isApiExposed()
 * @method static string getSenderModel()
 * @method static string getSenderModelTable()
 * @method static string getFeedOwnerModel()
 * @method static string getFeedOwnerModelTable()
 * @method static bool autoCreateFeed()
 * @method static void resolveFeedOwnerAccess(Closure $callback)
 * @method static void authorizeFeedAccess($user, $feedOwnerModel)
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
