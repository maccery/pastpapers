@extends('layouts.app')
@section('title', 'Search Results | ')
@section('content')
<div class="content-row">
    <div class="container">
        <h1>Search results</h1>
        @if(count($versions) == 0)
            <p>No results found. Here are some tips...</p>
            @include('search.tips')
        @else
            <table class="table">
            @foreach($versions as $version)
                <tr>
                    <td><a href="{{ route('browse_by_version', ['software' => $version->software->id, 'version' => $version->id]) }}">{{ $version->software->name }} {{ $version->version }}</a></td>
                    <td>{{ $version->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
            </table>
            <h2>Not what you were looking for?</h2>
            @include('search.tips')
        @endif
    </div>
</div>
@endsection


