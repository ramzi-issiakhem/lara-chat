<?php

namespace Ramzi\LaraChat\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Ramzi\LaraChat\Exceptions\FeedNotFoundException;
use Ramzi\LaraChat\Http\Resources\FeedResource;
use Ramzi\LaraChat\Utils\CustomJsonResponseHelper;

class FeedController extends BaseController
{
    /**
     * Retrieve the feed Resource for the given feed Owner Model with the threads.
     * @param Request $request
     * @return JsonResponse
     * @throws FeedNotFoundException
     */
    public function __invoke(Request $request): JsonResponse
    {
        // Retrieve the Feed Owner Model from the Request that was created by the Middleware
        $feed = \feed();

        // Retrieve the Feed for the Feed Owner Model and check if it exists
        $feed = $feed->load("threads")->first();

        $feedResource = new FeedResource($feed);
        return CustomJsonResponseHelper::successResponse(200, $feedResource);

    }

}
