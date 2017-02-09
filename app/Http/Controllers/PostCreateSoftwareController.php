<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateSoftware;

class PostCreateSoftwareController extends Controller
{
    public function store(PostCreateSoftware $request)
    {
        \App\Software::create([
            'name' => $request->input('name'),
            'user_id' => $request->user()->id,
        ]);
        return back();
    }
}
