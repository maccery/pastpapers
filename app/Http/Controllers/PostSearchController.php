<?php

namespace App\Http\Controllers;

use App\PastPaper;
use Illuminate\Http\Request;
use App\Http\Requests\PostSearchRequest;

class PostSearchController extends Controller
{
    public function search(PostSearchRequest $request)
    {
        $search_query = $request->input('query');

        $past_papers = PastPaper::where('past_paper', 'like', '%' . $search_query . '%')
            ->orWhereHas('subject', function($q) use ($search_query) {
                $q->where('name', 'like', '%' . $search_query . '%');
                foreach (explode(' ', $search_query) as $item)
                {
                    $q->orWhere('name', 'like', '%' . $item . '%');
                }
            })
            ->get();

        return response()->view('search.results', ['past_papers' => $past_papers]);
    }
}
