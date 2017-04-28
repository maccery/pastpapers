<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\PostAnswer;

class PostController extends Controller
{
    public function store(PostAnswer $request)
    {
        $subject = Answer::create([
            'description' => $request->input('description'),
            'paper_question_id' => $request->input('paper_question_id'),
            'user_id' => $request->user()->id,
        ]);

        $positive_tags = explode(',', $request->input('positive'));
        foreach ($positive_tags as $positive_tag) {
            $tag = Tag::firstOrCreate(['type' => 'positive', 'name' => trim($positive_tag)]);
            $subject->tags()->save($tag);
        }

        $positive_tags = explode(',', $request->input('negative'));
        foreach ($positive_tags as $positive_tag) {
            $tag = Tag::firstOrCreate(['type' => 'negative', 'name' => trim($positive_tag)]);
            $subject->tags()->save($tag);
        }

        return back();
    }
}
