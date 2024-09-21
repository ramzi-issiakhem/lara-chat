<?php

namespace Ramzi\LaraChat\Http\Middlewares;

use Ramzi\LaraChat\Exceptions\FeedOwnerModelNotFoundException;
use Ramzi\LaraChat\Exceptions\UnauthorizedFeedAccessException;
use Ramzi\LaraChat\Facades\LaraChat;

class CheckFeedOwnerAccess
{

    /**
     * @throws FeedOwnerModelNotFoundException
     * @throws UnauthorizedFeedAccessException
     */
    public function handle($request, $next)
    {

        $modelClass = LaraChat::getFeedOwnerModel();
        $feedOwnerModelId = $request->route('feedOwnerModelId');

        // Retrieve the Feed Owner Model and check if it exists
        $feedOwnerModel = $modelClass::find($feedOwnerModelId)->first();
        if (!$feedOwnerModel) {
            throw new FeedOwnerModelNotFoundException();
        }

        $hasAccess = Larachat::authorizeFeedAccess($request->user(), $feedOwnerModel);
        if (!$hasAccess) {
            throw new UnauthorizedFeedAccessException(null, 403, [
                'feedOwnerModelId' => $feedOwnerModelId
            ]);
        }

        $request->attributes->set('feedOwnerModel', $feedOwnerModel);

        return $next($request);

    }
}
