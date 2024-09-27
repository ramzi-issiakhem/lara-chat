<?php

namespace Ramzi\LaraChat\Http\Controllers\Thread;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Ramzi\LaraChat\Http\Controllers\BaseController;
use Ramzi\LaraChat\Http\Resources\ThreadCollection;
use Ramzi\LaraChat\Utils\CustomJsonResponseHelper;

class ThreadParticipantController extends BaseController
{

    /**
     * Add a participant to the Thread.
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        return CustomJsonResponseHelper::successResponse(200, "Participant added successfully");

    }


    /**
     * Remove a participant from the Thread.
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse {
        return CustomJsonResponseHelper::successResponse(200, "Participant removed successfully");
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
