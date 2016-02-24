<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	    <meta name="description" content="Debt Tracker">
	    <meta name="author" content="Halil Ibrahim Penekli">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, user-scalable=no">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        
		<!-- Scripts -->
        <script src="/bower_components/webcomponentsjs/webcomponents-lite.min.js"></script>

        <!-- Polymer elements -->
        <link rel="import" href="/bower_components/polymer/polymer.html">
        <link rel="import" href="/bower_components/iron-ajax/iron-ajax.html">
        <link rel="import" href="/bower_components/iron-icons/iron-icons.html">
        <link rel="import" href="/bower_components/font-roboto/roboto.html">
        <link rel="import" href="/bower_components/paper-styles/color.html">
        <link rel="import" href="/bower_components/paper-styles/typography.html">
        <link rel="import" href="/bower_components/iron-flex-layout/iron-flex-layout.html">
       
       <!-- Styles -->	
        <style is="custom-style">
            body { 
                @apply(--paper-font-body1);
                background: #eaeaea; 
                }
        </style>
        
		@yield('header')

		<title>Debt Tracker</title>
	</head>
	<body class="fullbleed layout vertical" unresolved>
        <!-- Content -->
        @yield('content')
       
		<!-- Scripts -->
		@yield('script')
	</body>
</html>