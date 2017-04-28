<?php

namespace App\Http\Controllers;

use App\Answer;
use App\SuggestedReleaseDateVote;
use Illuminate\Http\Request;
use App\Http\Requests\PostSuggestDateRequest;

class PostSuggestDateController extends Controller
{
    public function store(PostSuggestDateRequest $request)
    {
        $timestamp = date("Y-m-d H:i:s", strtotime($request->input('release_date')));
        $subject = \App\SuggestedReleaseDate::create([
            'release_date' => $timestamp,
            'past_paper_id' => $request->input('past_paper_id'),
            'user_id' => $request->user()->id,
        ]);
        return back();
    }
}
