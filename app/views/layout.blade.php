<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	    <meta name="description" content="Debt Tracker">
	    <meta name="author" content="Halil Ibrahim Penekli">

		
		<!-- Styles -->	
		{{ HTML::style('css/metro-bootstrap.css') }}
		{{ HTML::style('css/metro-bootstrap-responsive.css') }}

		<!-- Scripts -->	
		@yield('header-script')

		<title>Debt Tracker</title>
	</head>
	<body class="metro">
		<!-- Navigaion Bar -->

		@yield('content')

		<!-- Footer Bar -->

		<!-- Scripts -->
		{{ HTML::script('js/jquery/jquery.min.js') }}
		{{ HTML::script('js/jquery/jquery.mousewheel.js') }}
		{{ HTML::script('js/jquery/jquery.widget.min.js') }}
		{{ HTML::script('js/metro/metro-loader.js') }}
		{{ HTML::script('js/custom/custom.js') }}
		@yield('script')
	</body>
</html>