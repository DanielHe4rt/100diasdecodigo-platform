<?php

namespace App\Http\Controllers;

use App\Models\Tweet\Tweet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function getTimeline(Request $request): JsonResponse
    {
        $query = Tweet::query()
            ->with(['user', 'medias']);

        if ($request->has('twitter_id')) {
            $query = $query->where('twitter_id', $request->input('twitter_id'));
        }

        $query = $query->orderByDesc('tweeted_at')->paginate();

        return response()->json($query);
    }
}
