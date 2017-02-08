<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Requests\PostReview;

class PostController extends Controller
{
    public function store(PostReview $request)
    {
        $software = Review::create([
            'description' => $request->input('description'),
            'title' => $request->input('title'),
            'version_id' => $request->input('version_id'),
            'user_id' => $request->user()->id,
        ]);
        return back();
    }
}
