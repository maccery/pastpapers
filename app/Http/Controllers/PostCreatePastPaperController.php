<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreatePastPaper;
use App\Subject;

class PostCreatePastPaperController extends Controller
{
    public function store(PostCreatePastPaper $request)
    {
        $past_paper = \App\PastPaper::create([
            'subject_id' => $request->input('subject_id'),
            'past_paper' => $request->input('past_paper_name'),
            'url' => $request->input('url'),
            'solutions_url' => $request->input('solutions_url'),
            'user_id' => $request->user()->id,
        ]);

        $subject = Subject::where(['id' => $request->input('subject_id')])->first();
        return redirect()->route('browse_name', ['subject' => $subject]);
    }
}
