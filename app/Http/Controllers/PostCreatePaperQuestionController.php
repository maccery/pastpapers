<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreatePaperQuestion;
use App\PastPaper;

class PostCreatePaperQuestionController extends Controller
{
    public function store(PostCreatePaperQuestion $request)
    {
        $past_paper = \App\PaperQuestion::create([
            'question' => $request->input('name'),
            'past_paper_id' => $request->input('past_paper_id'),
            'user_id' => $request->user()->id,
            'confirmed_real' => 1,
        ]);

        $past_paper = PastPaper::where(['id' => $request->input('past_paper_id')])->first();
        return redirect()->route('browse_by_past_paper', ['subject'=> $past_paper->subject, 'past_paper' => $past_paper]);
    }
}
