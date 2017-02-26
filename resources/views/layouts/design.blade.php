<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
</head>
<body>
<div id="app">
    @yield('header')
    @include('errors.generic')
    @yield('content')
</div>
@include('layouts.footer')
</body>
</html>
