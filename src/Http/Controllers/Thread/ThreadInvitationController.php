<?php

namespace Ramzi\LaraChat\Http\Controllers\Thread;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Ramzi\LaraChat\Http\Controllers\BaseController;
use Ramzi\LaraChat\Http\Resources\ThreadCollection;
use Ramzi\LaraChat\Utils\CustomJsonResponseHelper;

class ThreadInvitationController extends BaseController
{

    /**
     * Create a new Invitation for the Thread
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        return CustomJsonResponseHelper::successResponse(200, "Invitation created successfully");

    }


    /**
     * Unvalidate an Invitation for the Thread
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse {
        return CustomJsonResponseHelper::successResponse(200, "Invitation unvalidated successfully");
    }


    /**
     * Join the thread using the invitation link.
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        return CustomJsonResponseHelper::successResponse(200, "Invitation link is valid");
    }
}
