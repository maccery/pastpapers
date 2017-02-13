<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
</head>
<body>
<div id="app">
    @include('layouts.navigation')
    @yield('content')
</div>
@include('layouts.footer')
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
