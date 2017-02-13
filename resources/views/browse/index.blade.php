@extends('layouts.app')
@section('content')
    <div class="content-row">
        <div class="container">
            <h1>Browse</h1>
            <ul class="breadcrumb">
                <li class="active">Browse</li>
            </ul>
            <p>Don't see the software you want? <a href="{{ route('create_software') }}">Add it</a></p>
            <table class="table">
                <th>Name</th>
                <th>Confirmed</th>
                @foreach ($softwares as $software)
                    <tr>
                        <td><a href="{{ route('browse_name', $software->id) }}">{{ $software->name }}</a></td>
                        <td>{{ ($software->confirmed_real) ? 'Yes' : 'No' }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
