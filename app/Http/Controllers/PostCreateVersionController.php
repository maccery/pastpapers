<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateVersion;

class PostCreateVersionController extends Controller
{
    public function store(PostCreateVersion $request)
    {
        $version = \App\Version::create([
            'software_id' => $request->input('software_id'),
            'version' => $request->input('version_name'),
            'user_id' => $request->user()->id,
        ]);
        return back();
    }
}
