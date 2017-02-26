<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateQuestion;

class PostCreateQuestionController extends Controller
{
    public function store(PostCreateQuestion $request)
    {
        \App\Question::create([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
            'user_id' => $request->user()->id,
        ]);
        return redirect()->route('help');
    }
}
