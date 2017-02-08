<?php

namespace App\Http\Controllers;

use App\Review;
use App\Tag;
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

        $positive_tags = explode(',', $request->input('positive'));
        foreach ($positive_tags as $positive_tag) {
            $tag = Tag::firstOrCreate(['type' => 'positive', 'name' => trim($positive_tag)]);
            $software->tags()->save($tag);
        }

        $positive_tags = explode(',', $request->input('negative'));
        foreach ($positive_tags as $positive_tag) {
            $tag = Tag::firstOrCreate(['type' => 'negative', 'name' => trim($positive_tag)]);
            $software->tags()->save($tag);
        }

        return back();
    }
}
