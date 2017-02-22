<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name') }}</title>
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="https://use.typekit.net/kmj4cek.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
@stack('scripts')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Meagle.org</title>
<link rel="stylesheet" tfype="text/css" href="{{ secure_asset_production('css/app.css?v=7') }}">