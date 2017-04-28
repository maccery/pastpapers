<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateSubject;

class PostCreateSubjectController extends Controller
{
    public function store(PostCreateSubject $request)
    {
        \App\Subject::create([
            'name' => $request->input('name'),
            'user_id' => $request->user()->id,
        ]);
        return redirect()->route('browse');
    }
}
