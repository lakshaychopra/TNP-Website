<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> {{--
    <!-- Tell the browser to be responsive to screen width -->--}}
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no,user-scalable=no">
    <link rel="canonical" href="https://www.tnpgndec.com/">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="description" content="This is official application of Training and Placement Cell, GNDEC, Ludhiana.">
    <meta name="author" content="co-authored by Sanjampreet Singh, Karamveer Singh">
    <meta name="keywords" content="gndec,gne,t&p,cell">
    <meta name="theme-color" content="#038ed4">

    <link rel="icon" type="image/png" href="{{asset('/images/icons/180x180.png')}}" sizes="180x180" />
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"> {{-- OG Tags --}}
    <script type='application/ld+json'>
        {
            "@context": "http://schema.org/",
            "@type": "CollegeOrUniversity",
            "address": {
                "@type": "PostalAddress",
                "addressCountry": "India",
                "addressLocality": "Ludhiana, Punjab",
                "addressRegion": "Guru Nanak Dev Engineering College Gill Park Ludhiana 141006",
                "postOfficeBoxNumber ": "141006 ",
                "postalCode ": "141006 ",
                "streetAddress ": "Guru Nanak Dev Engineering College Gill Park Ludhiana 141006 ",
                "email ": "tpo@gndec.ac.in ",
                "faxNumber ": " + 911612501106 ",
                "telephone ": " + 9101615064510 ",
                "alternateName ": "T&P Cell, GNDEC",
                "description": "This is official application of Training and Placement Cell, GNDEC, Ludhiana.",
                "disambiguatingDescription": "Training and Placement Cell, GNDEC",
                "name": "Training and Placement Cell, GNDEC"
            },
            "mainEntityOfPage": "https://www.tnpgndec.com",
            "brand": "https://www.tnpgndec.com",
            "email": "tpo@gndec.ac.in",
            "faxNumber": "+911612501106 ",
            "foundingDate": "1956",
            "globalLocationNumber": "+91",
            "telephone": "+919872219178",
            "alternateName": "T&P Cell,GNDEC ",
            "description ": "This is official application of Training and Placement Cell, GNDEC,Ludhiana.",
            "disambiguatingDescription ": "Training and Placement Cell, GNDEC ",
            "name ": "Training and Placement Cell, GNDEC "
        }
    </script>
    {{-- fb --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="Training and Placement Cell">
    <meta property="og:url" content="https://www.tnpgndec.com">
    <meta property="og:site_name" content="T&P">
    <meta property="og:description" content="This is official application of Training and Placement Cell, GNDEC, Ludhiana.">
    <meta property="og:image" content="{{asset('/images/icons/512x512.jpg')}}">
    <meta property="og:locale" content="en_US"> 
    {{-- twitter --}}
    <meta name="twitter:card" content="summary"> {{--
    <meta name="twitter:site" content="@site_account"> --}} 
    <meta name="twitter:creator" content="@itzrealsanjam">
    <meta name="twitter:url" content="https://www.tnpgndec.com">
    <meta name="twitter:title" content="Training and Placement Cell">
    <meta name="twitter:description" content="This is official application of Training and Placement Cell, GNDEC, Ludhiana.">
    <meta name="twitter:image" content="{{asset('/images/icons/512x512.png')}}"> 
    {{-- title --}}
    <title>Training and Placement Cell</title>

    <link type="text/plain" rel="author" href="{{asset('humans.txt')}}" />
    <link href="/css/style.css" rel="stylesheet">
    <link rel="manifest" href="{{asset('manifest.webmanifest')}}">
    <script async src="https://cdn.jsdelivr.net/npm/pwacompat@2.0.6/pwacompat.min.js" integrity="sha384-GOaSLecPIMCJksN83HLuYf9FToOiQ2Df0+0ntv7ey8zjUHESXhthwvq9hXAZTifA"
        crossorigin="anonymous"></script>
    <meta name="msvalidate.01" content="12764669904A814D6F82E14D5B9DCD1E" />
    <meta name="robots" content="INDEX,FOLLOW"> 
    {{-- apple --}}
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="T&P">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('/images/icons/57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('/images/icons/60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('/images/icons/72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/images/icons/76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('/images/icons/114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('/images/icons/120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('/images/icons/144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('/images/icons/152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/images/icons/180x180.png')}}">
    {{-- ms --}}
    <meta name="msapplication-TileImage" content="{{asset('/images/icons/144x144.png')}}">
    <meta name="msapplication-TileColor" content="#fff"> 
    {{-- JS fallback --}}
    <noscript>Your browser does not support JavaScript!</noscript>
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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122948554-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-122948554-1');
    </script>

</body>

</html>