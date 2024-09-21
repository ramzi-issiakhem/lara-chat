<?php

namespace Ramzi\LaraChat\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Ramzi\LaraChat\Exceptions\FeedNotFoundException;
use Ramzi\LaraChat\Exceptions\FeedOwnerModelNotFoundException;
use Ramzi\LaraChat\Facades\LaraChat;
use Ramzi\LaraChat\Http\Resources\FeedResource;
use Ramzi\LaraChat\Http\Utils\CustomJsonResponseHelper;
use Ramzi\LaraChat\Models\Feed;
use Ramzi\LaraChat\Traits\ManageMessageSenderModel;

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
        $feedOwnerModel = $request->get('feedOwnerModel');

        // Retrieve the Feed for the Feed Owner Model and check if it exists
        $feed = $feedOwnerModel->feed()->with("threads")->first();
        if (!$feed) {
            if (LaraChat::autoCreateFeed()) {
                $feed = $feedOwnerModel->feed()->create([]);
            } else {
                throw new FeedNotFoundException(null, 404, [
                    'feedOwnerModel' => $feedOwnerModel
                ]);
            }
        }


        $feedResource = FeedResource::make($feed);
        return CustomJsonResponseHelper::successResponse(200, $feedResource);

    }

}
