<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateVersion;
use App\Software;

class PostCreateVersionController extends Controller
{
    public function store(PostCreateVersion $request)
    {
        $version = \App\Version::create([
            'software_id' => $request->input('software_id'),
            'version' => $request->input('version_name'),
            'user_id' => $request->user()->id,
        ]);

        $software = Software::where(['id' => $request->input('software_id')])->first();
        return redirect()->route('browse_name', ['software' => $software]);
    }
}
