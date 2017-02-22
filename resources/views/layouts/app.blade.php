<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
</head>
<body>
<div id="app">
    @include('layouts.navigation')
    @include('errors.generic')
    @yield('content')
</div>
@include('layouts.footer')
<script src="{{ secure_asset_production('js/app.js') }}"></script>
</body>
</html>
