@extends('layouts.app')
@section('title', 'Browse | ')
@section('content')
    <div class="content-row">
        <div class="container">
            <h1>Browse</h1>
            <ul class="breadcrumb">
                <li class="active">Browse</li>
            </ul>
            <p>Don't see the subject you want? <a href="{{ route('create_subject') }}">Add it</a></p>
            <table class="table">
                <? $previous_letter = ''; ?>
                @foreach ($subjects as $subject)
                    <? $current_letter = ucfirst(substr($subject->name, 0, 1)); ?>
                    @if ($current_letter != $previous_letter)
                    <? $previous_letter = $current_letter ?>
            </table>
            <h2>{{ $previous_letter }}</h2>
                <table class="table table-responsive">
                    @endif
                    <tr>
                        <td><a href="{{ route('browse_name', $subject->id) }}">{{ $subject->name }}</a></td>

                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
