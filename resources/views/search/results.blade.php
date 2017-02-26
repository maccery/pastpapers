@extends('layouts.app')
@section('title', 'Search Results | ')
@section('content')
<div class="content-row">
    <div class="container">
        <h1>Search results</h1>
        @if(count($versions) == 0)
            <p>No results found. Here are some tips...</p>
            <p>
                <ul class="list">
                <li>Try to be less specific, e.g search 'Android' rather than 'Android KitKat'</li>
                <li>You can <a href="{{ route('browse') }}">browse</a> by software name instead</li>
            </ul>
            <p><b>Still can't find what you're looking for?</b>
                <br>It might not have been added yet. So why not <a href="{{ route('create_software') }}">add</a> the software?</p>
        @endif
        <table class="table">
        @foreach($versions as $version)
            <tr>
                <td><a href="{{ route('browse_by_version', ['software' => $version->software->id, 'version' => $version->id]) }}">{{ $version->software->name }} {{ $version->version }}</a></td>
                <td>{{ $version->created_at->diffForHumans() }}</td>
            </tr>
        @endforeach
        </table>
    </div>
</div>
@endsection


