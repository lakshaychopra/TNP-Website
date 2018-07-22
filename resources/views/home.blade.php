<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--  <!-- Tell the browser to be responsive to screen width -->  --}}
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no,user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="description" content="This is official application of Training and Placemant Cell, GNDEC, Ludhiana.">
    <meta name="author" content="co-authored by Sanjampreet Singh, Karamveer Singh">
    <meta name="keywords" content="gndec,gne,t&p,cell">
    <meta name="theme-color" content="#038ed4">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    {{--  OG Tags   --}}
	<meta property="og:type" content="website">
	<meta property="og:title" content="Training and Placemant Cell">
	{{--  <meta property="og:url" content="">  --}}
	<meta property="og:site_name" content="T&P">
	<meta property="og:description" content="This is official application of Training and Placemant Cell, GNDEC, Ludhiana.">
	<meta property="og:image" content="{{asset('/images/icons/180x180.png')}}">
	<meta property="og:locale" content="en_US">


    <title>Training and Placemant Cell</title>
    <link type="text/plain" rel="author" href="{{asset('humans.txt')}}" />
    <link href="/css/style.css" rel="stylesheet">
    <link rel="manifest" href="{{asset('manifest.json')}}">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="T&P">
    <link rel="apple-touch-icon" href="{{asset('/images/icons/57x57.png')}}" sizes="57x57">
    <link rel="apple-touch-icon" href="{{asset('/images/icons/60x60.png')}}" sizes="60x60">
    <link rel="apple-touch-icon" href="{{asset('/images/icons/72x72.png')}}" sizes="72x72">
    <link rel="apple-touch-icon" href="{{asset('/images/icons/76x76.png')}}" sizes="76x76">
    <link rel="apple-touch-icon" href="{{asset('/images/icons/114x114.png')}}" sizes="114x114">
    <link rel="apple-touch-icon" href="{{asset('/images/icons/120x120.png')}}" sizes="120x120">
    <link rel="apple-touch-icon" href="{{asset('/images/icons/144x144.png')}}" sizes="144x144">
    <link rel="apple-touch-icon" href="{{asset('/images/icons/152x152.png')}}" sizes="152x152">
    <link rel="apple-touch-icon" href="{{asset('/images/icons/180x180.png')}}" sizes="180x180">
   
    <meta name="msapplication-TileImage" content="{{asset('/images/icons/144x144.png')}}">
    <meta name="msapplication-TileColor" content="#fff">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!--[if lte IE 9]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
			<![endif]-->

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="root">
        <router-view></router-view>
    </div>
    <script type="text/javascript" src="/js/bundle.min.js"></script>
    <script type="text/javascript" src="service-worker.js"></script>
</body>

</html>