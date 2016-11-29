<?php

namespace App\Http\Controllers;

use App\Review;
use App\SuggestedReleaseDateVote;
use Illuminate\Http\Request;
use App\Http\Requests\PostSuggestDateRequest;

class PostSuggestDateController extends Controller
{
    public function store(PostSuggestDateRequest $request)
    {
        $timestamp = date("Y-m-d H:i:s", strtotime($request->input('release_date')));
        $software = \App\SuggestedReleaseDate::create([
            'release_date' => $timestamp,
            'version_id' => $request->input('version_id'),
            'user_id' => $request->user()->id,
        ]);
        return back();
    }
}
