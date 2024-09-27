<?php

namespace Ramzi\LaraChat\Http\Middlewares;

use Ramzi\LaraChat\Exceptions\FeedNotFoundException;
use Ramzi\LaraChat\Exceptions\FeedOwnerModelNotFoundException;
use Ramzi\LaraChat\Exceptions\UnauthorizedFeedAccessException;
use Ramzi\LaraChat\Facades\LaraChat;
use Ramzi\LaraChat\Models\Feed;

class CanAccessFeed
{

    /**
     * @throws FeedOwnerModelNotFoundException
     * @throws UnauthorizedFeedAccessException
     * @throws FeedNotFoundException
     */
    public function handle($request, $next)
    {

        $modelClass = LaraChat::getFeedOwnerModel();
        $feedOwnerModelId = $request->route('feed_owner');

        try {
            $feedOwnerModel = $modelClass::findOrFail($feedOwnerModelId);
        } catch (\Exception $e) {
            throw new FeedOwnerModelNotFoundException();
        }


        $hasAccess = Larachat::authorizeFeedAccess($request->user(), $feedOwnerModel);
        if (!$hasAccess) {
            throw new UnauthorizedFeedAccessException(null, 403, [
                'feedOwnerModelId' => $feedOwnerModelId
            ]);
        }


        // Retrieve the Feed for the Feed Owner Model and check if it exists
        $feed = $feedOwnerModel->feed()->first();
        if (!$feed) {
            if (LaraChat::autoCreateFeed()) {
                $feed = $feedOwnerModel->feed()->create([]);
            } else {
                throw new FeedNotFoundException(null, 404, [
                    'feedOwnerModel' => $feedOwnerModel
                ]);
            }
        }

        app()->singleton(Feed::class, function () use ($feed) {
            return $feed;
        });

        $request->route()->forgetParameter('feed_owner');

        return $next($request);

    }
}
