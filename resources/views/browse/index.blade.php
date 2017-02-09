@extends('layouts.app')
@section('content')
    <h1>Browse</h1>
    <a href="{{ route('create_software') }}">Add something new</a>
    <table class="table">
        <th>Name</th>
        <th>Confirmed</th>
        @foreach ($softwares as $software)
        <tr>
            <td><a href="{{ route('browse_name', $software->id) }}">{{ $software->name }}</a></td>
            <td>Yes</td>
        </tr>
        @endforeach
    </table>
@endsection


