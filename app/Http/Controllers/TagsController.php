<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\JsonResponse;

class TagsController extends Controller
{
    public function getTags(): JsonResponse
    {
        return response()->json(Tag::paginate());
    }
}
