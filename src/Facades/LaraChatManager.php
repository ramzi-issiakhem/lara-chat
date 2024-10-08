<?php

namespace Ramzi\LaraChat\Facades;

use Closure;
use Illuminate\Http\Request;

class LaraChatManager
{

    private Closure $feedOwnerAccessResolver;


    /**
     * Verify if the migrations should be run by defalut when executing artisan migration command
     * @return bool
     */
    public static function shouldRunMigrations(): bool {
        return config("larachat.auto_migrate", true);
    }

    /**
     * Verify if the API is exposed and used.
     * @return bool
     */
    public static function isApiExposed() : bool {
        return config("larachat.api.expose",true);
    }

    /**
     * Retrieve the base user model class that interact with the messages.
     * @return string
     */
    public static function getSenderModel(): string
    {
        return config("larachat.message_sender_model", \App\Models\User::class);
    }

    /**
     * Retrieve the Database table for the base user model that interact the messages.
     * @return string
     */
    public function getSenderModelTable(): string
    {
        $model = $this->getSenderModel();

        return app($model)->getTable();
    }

    /**
     * Retrieve the Feed Owner model class that host its feed.
     * @return string
     */
    public static function getFeedOwnerModel(): string
    {
        return config("larachat.feed_owner_model", \App\Models\User::class);
    }

    /**
     * Retrieve the Database table for the Feed Owner model that host its feed.
     * @return string
     */
    public function getFeedOwnerModelTable(): string
    {
        $model = $this->getFeedOwnerModel();

        return app($model)->getTable();
    }

    /**
     * Verify if the Feed should be created automatically if not found.
     * @return bool
     */
    public static function autoCreateFeed(): bool
    {
        return config("larachat.auto_create_feed", true);
    }

    /**
     * Resolve the access logic to the feed model.
     * @param Closure $callback
     * @return LaraChatManager
     */
    public function resolveFeedOwnerAccess(Closure $callback): static
    {
        $this->feedOwnerAccessResolver = $callback;
        return $this;
    }

    /**
     * Authorize the access to the feed.
     * @param $user
     * @param $feedOwnerModel
     * @return bool
     */
    public function authorizeFeedAccess($user, $feedOwnerModel): bool
    {
        $callback = $this->feedOwnerAccessResolver;
        return $callback($user, $feedOwnerModel);
    }

}
