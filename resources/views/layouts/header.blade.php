<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
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
<meta name="description" content="@yield('description', "PastPaper is home to completely impartial subject answers, surfacing expert opinion from people who matter the most.")"/>
<meta property="og:image" content="{{ asset('images/horizontal-logo.png', true) }}">
<meta property="og:title" content="@yield('title','')PastPaper: Crowdsourced Past Paper Solutions">
<meta property="og:description" content="@yield('description', "PastPaper is home to completely impartial subject answers, surfacing expert opinion from people who matter the most.")">
<title>@yield('title','')PastPaper: Crowdsourced Past Paper Solutions</title>
<link rel="stylesheet" type="text/css" href="{{ secure_asset_production(elixir('css/app.css')) }}">
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', '{{ env('GOOGLE_ANALYTICS_ID', '') }}', 'auto');
    ga('send', 'pageview');

</script>