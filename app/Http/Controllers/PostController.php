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
            'version_id' => 1,
            'user_id' => 1,
            'software_id' => 1
        ]);
        return back();
    }
}
