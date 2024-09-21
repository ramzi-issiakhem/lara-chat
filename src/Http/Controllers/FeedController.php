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
     * Retrieve the feed Resource for the given feed Owner Model.
     * @param Request $request
     * @return JsonResponse
     * @throws FeedNotFoundException
     */
    public function show(Request $request): JsonResponse
    {
        $feedOwnerModel = $request->get('feedOwnerModel');

        // Retrieve the Feed for the Feed Owner Model and check if it exists
        $feed = $this->verifyAndReturnFeed(
            $feedOwnerModel->feed()->withCount('threads')->first(),
            $feedOwnerModel
        );

        $feedResource = FeedResource::make($feed);
        return CustomJsonResponseHelper::successResponse(200, $feedResource);

    }

    /**
     * Retrieve the feed Resource for the given feed Owner Model with the threads.
     * @param Request $request
     * @return JsonResponse
     * @throws FeedNotFoundException
     */
    public function index(Request $request): JsonResponse
    {

        $feedOwnerModel = $request->get('feedOwnerModel');

        // Retrieve the Feed for the Feed Owner Model and check if it exists
        $feed = $this->verifyAndReturnFeed(
            $feedOwnerModel->feed()->with('threads')->first(),
            $feedOwnerModel
        );


        $feedResource = FeedResource::make($feed);
        return CustomJsonResponseHelper::successResponse(200, $feedResource);

    }

    /**
     * Retrieve the feed for the given feed Owner Model after verifying its existence.
     * @param $feed
     * @param $feedOwnerModel
     * @return mixed
     * @throws FeedNotFoundException
     */
    private function verifyAndReturnFeed($feed, $feedOwnerModel): mixed
    {
        if (!$feed) {
            if (LaraChat::autoCreateFeed()) {
                return $feed->feed()->create([]);
            } else {
                throw new FeedNotFoundException(null, 404, [
                    'feedOwnerModel' => $feedOwnerModel
                ]);
            }
        }

        return $feed;
    }

}
