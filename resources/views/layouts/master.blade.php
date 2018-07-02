<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	
	<meta name="description" content="This is official application of Training and Placemant Cell, GNDEC, Ludhiana.">
	<meta name="author" content="Sanjampreet Singh, Karamveer Singh">
	<meta name="theme-color" content="#fff">

	<title>Laravel</title>

	<link href="/css/style.css" rel="stylesheet">
	<link rel="manifest" href="{{asset('manifest.json')}}">
	<link rel="apple-touch-icon" href="icon.png">
	
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
				<script src="/js/bundle.min.js"></script>
			</body>
			</html>