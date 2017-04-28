@extends('layouts.app')
@section('title', 'Search Results | ')
@section('content')
<div class="content-row">
    <div class="container">
        <h1>Search results</h1>
        @if(count($past_papers) == 0)
            <p>No results found. Here are some tips...</p>
            @include('search.tips')
        @else
            <table class="table">
            @foreach($past_papers as $past_paper)
                <tr>
                    <td><a href="{{ route('browse_by_past_paper', ['subject' => $past_paper->subject->id, 'past_paper' => $past_paper->id]) }}">{{ $past_paper->subject->name }} {{ $past_paper->past_paper }}</a></td>
                    <td>{{ $past_paper->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
            </table>
            <h2>Not what you were looking for?</h2>
            @include('search.tips')
        @endif
    </div>
</div>
@endsection


