@extends('layout.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <ul class="list list-unstyled">
                            @foreach ($softwares as $software)
                                <li><a href="{{ route('browse_name', $software->id) }}">{{ $software->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


