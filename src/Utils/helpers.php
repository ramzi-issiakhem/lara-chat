<?php


use Ramzi\LaraChat\Models\Feed;

if (!function_exists('feed')) {
    /**
     * Get the Feed Singleton instance in the app
     * @return Feed
     */
    function feed(): Feed
    {
        return app(Feed::class);
    }
}
