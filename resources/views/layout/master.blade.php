<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title', 'Laravel')</title>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('source/assets/dest/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('source/assets/dest/vendors/colorbox/example3/colorbox.css') }}">
	<link rel="stylesheet" href="{{ asset('source/assets/dest/rs-plugin/css/settings.css') }}">
	<link rel="stylesheet" href="{{ asset('source/assets/dest/rs-plugin/css/responsive.css') }}">
	<link rel="stylesheet" title="style" href="{{ asset('source/assets/dest/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('source/assets/dest/css/animate.css') }}">
	<!-- CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dest/css/settings.css') }}">

<!-- JS -->
<script type="text/javascript" src="{{ asset('assets/dest/js/jquery.themepunch.plugins.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/dest/js/jquery.themepunch.revolution.min.js') }}"></script>

	<link rel="stylesheet" title="style" href="{{ asset('source/assets/dest/css/huong-style.css') }}">
</head>
<body>
@include('layout.header')
	{{-- Nội dung chính --}}
	@yield('content')

	{{-- Footer --}}
	@include('layout.footer')

	{{-- Scripts --}}
	<script src="{{ asset('source/assets/dest/js/jquery.js') }}"></script>
	<script src="{{ asset('source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js') }}"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="{{ asset('source/assets/dest/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
	<script src="{{ asset('source/assets/dest/vendors/colorbox/jquery.colorbox-min.js') }}"></script>
	<script src="{{ asset('source/assets/dest/vendors/animo/Animo.js') }}"></script>
	<script src="{{ asset('source/assets/dest/vendors/dug/dug.js') }}"></script>
	<script src="{{ asset('source/assets/dest/js/scripts.min.js') }}"></script>
	<script src="{{ asset('source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
	<script src="{{ asset('source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
	<script src="{{ asset('source/assets/dest/js/waypoints.min.js') }}"></script>
	<script src="{{ asset('source/assets/dest/js/wow.min.js') }}"></script>
	<script src="{{ asset('source/assets/dest/js/custom2.js') }}"></script>
	<script>
		$(document).ready(function($) {    
			$(window).scroll(function(){
				if($(this).scrollTop()>150){
					$(".header-bottom").addClass('fixNav')
				}else{
					$(".header-bottom").removeClass('fixNav')
				}
			});
		});
	</script>
</body>
</html>
