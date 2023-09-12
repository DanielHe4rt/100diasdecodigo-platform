<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserTagsRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MeController extends Controller
{
    public function getAuthenticatedUser(Request $request): JsonResponse
    {
        return response()->json($request->user());
    }
    public function postSyncTags(UpdateUserTagsRequest $request)
    {
        $response = $request
            ->user()
            ->tags()
            ->sync($request->input('tags'));

        return response()->json($response, Response::HTTP_CREATED);
    }
}
