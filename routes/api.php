<?php

use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\MeController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TimelineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users/me', [MeController::class, 'getAuthenticatedUser'])->name('auth.profile');
    Route::post('/users/tags', [MeController::class, 'postSyncTags'])->name('auth.profile.sync-tags');
});

Route::get('/timeline', [TimelineController::class, 'getTimeline'])->name('timeline');
Route::get('/tags', [TagsController::class, 'getTags'])->name('tags.index');

Route::get('/leaderboard', [LeaderboardController::class, 'getLeadearboard'])->name('leaderboard');

