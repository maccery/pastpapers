<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meagle.org</title>
    <script src="https://use.typekit.net/kmj4cek.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/browse.css') }}">
</head>
<body>
<div class="container">
    <h3 class="pull-right">meagle.org</h3>
    <h1>{{ $software->name }}</h1>
    @foreach ($reviews as $review)
        <h2>{{ $review->author->name }}</h2>
        <p>{{ $review->description }}</p>
    @endforeach
</div>
</body>
</html>
