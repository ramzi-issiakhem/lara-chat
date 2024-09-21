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
use Ramzi\LaraChat\Http\Resources\ThreadCollection;
use Ramzi\LaraChat\Http\Resources\ThreadResource;
use Ramzi\LaraChat\Http\Utils\CustomJsonResponseHelper;
use Ramzi\LaraChat\Models\Feed;
use Ramzi\LaraChat\Traits\ManageMessageSenderModel;

class ThreadController extends BaseController
{

    /**
     * Retrieve all threads for a given feed.
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {

        $feedOwner = $request->get('feedOwnerModel');
        $perPage = $request->get('per_page', 10);

        $threads = $feedOwner->feed->threads()->with("feeds")->paginate($perPage)->withQueryString();

        $threadCollection = new ThreadCollection($threads);

        return CustomJsonResponseHelper::successResponse(200, $threadCollection);
    }

    public function store()
    {
    }

    public function show()
    {
    }
}
