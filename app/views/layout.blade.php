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
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

		{{ HTML::script('js/metro/metro-core.js') }}	
		{{ HTML::script('js/metro/metro-touch-handler.js') }}	
		{{ HTML::script('js/metro/metro-accordion.js') }}	
		{{ HTML::script('js/metro/metro-button-set.js') }}	
		{{ HTML::script('js/metro/metro-date-format.js') }}	
		{{ HTML::script('js/metro/metro-calendar.js') }}	
		{{ HTML::script('js/metro/metro-datepicker.js') }}	
		{{ HTML::script('js/metro/metro-carousel.js') }}	
		{{ HTML::script('js/metro/metro-countdown.js') }}	
		{{ HTML::script('js/metro/metro-dropdown.js') }}	
		{{ HTML::script('js/metro/metro-input-control.js') }}	
		{{ HTML::script('js/metro/metro-live-tile.js') }}	
		{{ HTML::script('js/metro/metro-progressbar.js') }}	
		{{ HTML::script('js/metro/metro-rating.js') }}	
		{{ HTML::script('js/metro/metro-slider.js') }}	
		{{ HTML::script('js/metro/metro-tab-control.js') }}	
		{{ HTML::script('js/metro/metro-table.js') }}	
		{{ HTML::script('js/metro/metro-times.js') }}	
		{{ HTML::script('js/metro/metro-dialog.js') }}	
		{{ HTML::script('js/metro/metro-notify.js') }}	
		{{ HTML::script('js/metro/metro-listview.js') }}	
		{{ HTML::script('js/metro/metro-treeview.js') }}	
		{{ HTML::script('js/metro/metro-fluentmenu.js') }}	
		{{ HTML::script('js/metro/metro-hint.js') }}			
		{{ HTML::script('js/custom/custom.js') }}
		@yield('header-script')

		<title>Debt Tracker</title>
	</head>
	<body class="metro">
		<!-- Navigaion Bar -->

		@yield('content')

		<!-- Footer Bar -->

		<!-- Scripts -->
		@yield('script')
	</body>
</html>