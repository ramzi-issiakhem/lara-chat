<?php

namespace Ramzi\LaraChat\Http\Controllers\Thread;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Ramzi\LaraChat\Http\Controllers\BaseController;
use Ramzi\LaraChat\Http\Resources\ThreadCollection;
use Ramzi\LaraChat\Utils\CustomJsonResponseHelper;

class ThreadSeenController extends BaseController
{

    /**
     * Retrieve all the seen activities of a thread.
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return CustomJsonResponseHelper::successResponse(200, []);

    }


    /**
     * Remove a Message from the Thread.
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse {
        return CustomJsonResponseHelper::successResponse(200, "Message removed successfully");
    }


    /**
     * Modify a message.
     * @param Request $request
     * @return JsonResponse
     */
    public function put(Request $request): JsonResponse
    {
        return CustomJsonResponseHelper::successResponse(200, "Message edited successfully");
    }
}
