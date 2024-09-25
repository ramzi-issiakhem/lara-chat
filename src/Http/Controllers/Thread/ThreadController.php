<?php

namespace Ramzi\LaraChat\Http\Controllers\Thread;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Ramzi\LaraChat\Http\Controllers\BaseController;
use Ramzi\LaraChat\Http\Resources\ThreadCollection;
use Ramzi\LaraChat\Utils\CustomJsonResponseHelper;

class ThreadController extends BaseController
{

    /**
     * Retrieve all threads for a given feed.
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {

        // Retrieve the Feed Owner Model from the Request that was created by the Middleware
        $feed = \feed();
        $perPage = $request->get('per_page', 10);

        $threads = $feed->threads()
            ->with("feeds")
            ->withCount("participants")
            ->paginate($perPage)->withQueryString();

        $threadCollection = new ThreadCollection($threads);

        return CustomJsonResponseHelper::successResponse(200, $threadCollection);
    }

    public function store()
    {

    }

    /**
     * Retrieve all threads for a given feed.
     * @param Request $request
     * @return JsonResponse
     */
    public function show()
    {

    }
}
