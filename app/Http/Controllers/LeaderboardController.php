<?php

namespace App\Http\Controllers;

use App\Models\Tweet\Statistics;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function getLeadearboard(Request $request): JsonResponse
    {
        $leaderboard = Statistics::query()
            ->with('user');

        $leaderboard = $request->has('orderBy')
            ? $leaderboard->orderBy($request->input('orderBy'), 'desc')
            : $leaderboard->orderBy('days_participated', 'desc');

        return response()->json($leaderboard->paginate());
    }
}
