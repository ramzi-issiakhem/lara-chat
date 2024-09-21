<?php

namespace Ramzi\LaraChat\Http\Middlewares;

use Ramzi\LaraChat\Exceptions\FeedNotFoundException;
use Ramzi\LaraChat\Exceptions\FeedOwnerModelNotFoundException;
use Ramzi\LaraChat\Exceptions\UnauthorizedFeedAccessException;
use Ramzi\LaraChat\Facades\LaraChat;

class CheckFeedOwnerAccess
{

    /**
     * @throws FeedOwnerModelNotFoundException
     * @throws UnauthorizedFeedAccessException
     * @throws FeedNotFoundException
     */
    public function handle($request, $next)
    {

        $modelClass = LaraChat::getFeedOwnerModel();
        $feedOwnerModelId = $request->route('feedOwnerModelId');

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
        $feed = $feedOwnerModel->feed()->exists();
        if (!$feed) {
            if (LaraChat::autoCreateFeed()) {
                $feedOwnerModel->feed()->create([]);
            } else {
                throw new FeedNotFoundException(null, 404, [
                    'feedOwnerModel' => $feedOwnerModel
                ]);
            }
        }

        $request->attributes->set('feedOwnerModel', $feedOwnerModel);

        return $next($request);

    }
}
