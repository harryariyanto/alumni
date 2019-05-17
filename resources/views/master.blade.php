<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Fontys Alumni</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ URL::asset('public/css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ URL::asset('public/css/icomoon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ URL::asset('public/css/bootstrap.css') }}">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ URL::asset('public/css/magnific-popup.css') }}">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{ URL::asset('public/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('public/css/owl.theme.default.min.css') }}">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{ URL::asset('public/css/flexslider.css') }}">
	<!-- Pricing -->
	<link rel="stylesheet" href="{{ URL::asset('public/css/pricing.css') }}">
	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ URL::asset('public/css/style.css') }}">
	<!-- Custom style  -->
	<link rel="stylesheet" href="{{ URL::asset('public/css/custom.css') }}">
	<!-- Modernizr JS -->
	<script src="{{ URL::asset('public/js/modernizr-2.6.2.min.js') }}"></script>
	<!-- summernote editor -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>

<body>

	<div class="fh5co-loader"></div>

	<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-right">
							<p class="site">Fontys Alumni</p>
							@if(Auth::check())
								<p class="num">Hello {{ Auth::user()->first_name }}!</p>
							@endif
							<p class="num">+31 8850 80000 </p>
							<ul class="fh5co-social">
								<li><a href="https://www.facebook.com/FontysHogeschoolICT/"><i class="icon-facebook2"></i></a></li>
								<li><a href="https://twitter.com/ICT_Engineering"><i class="icon-twitter2"></i></a></li>
								<li><a href="https://www.instagram.com/fontyshogescholen/"><i class="icon-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="fh5co-logo">
								<a href="{{ url('/') }}">
									<img src="{{ URL::asset('public/images/logo.png') }}">
								</a>
							</div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li class="{{ Request::path() ==  '/' ? 'active' : ''  }}">
									<a href="{{ url('') }}">Home</a></li>
								<li class="{{ Request::path() ==  'about' ? 'active' : ''  }}">
									<a href="{{ url('about') }}">About</a></li>
								<li class="{{ Request::path() ==  'news' ? 'active' : ''  }}">
									<a href="{{ url('news') }}">News</a></li>

								@if(Auth::check())
									<li class="{{ Request::path() ==  'discussions' ? 'active' : ''  }}">
										<a href="{{ url('discussions') }}">Discussions</a></li>
									<li class="{{ Request::path() ==  'members' ? 'active' : ''  }}">
										<a href="{{ url('members') }}">Members</a></li>
									<li class="{{ Request::path() ==  'profile' ? 'active' : ''  }}">
										<a href="{{ url('profile') }}">Profile</a></li>
									@if(Auth::user()->status === 1)
										<li class="li-btn">
											<a href="{{ url('logout') }}">
												<span class="btn-purple">Log Out</span></a></li>
									@else
										<li class="li-btn">
											<a href="{{ url('logout') }}">
												<span class="btn-purple">Log Out</span></a></li>
										<li class="li-btn">
											<a href="{{ url('admin') }}">
												<span class="btn-pink">Admin Panel</span></a></li>
									@endif
								@else
									<li class="li-btn">
										<a href="{{ url('login') }}">
											<span class="btn-purple">Log In</span></a></li>
									<li class="li-btn">
										<a href="{{ url('register') }}">
											<span class="btn-pink">Register</span></a></li>
								@endif
							</ul>
						</div>
					</div>

				</div>
			</div>
		</nav>

		<div id="yield-content">
			@yield('content')
		</div>

		<footer id="fh5co-footer" role="contentinfo" style="background-image: url({{ URL::asset('public/images/img_bg_4.jpg') }});">
			<div class="overlay"></div>
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 fh5co-widget">
						<h3>Fontys Alumni</h3>
						<p>
							This is a website where Fontys alumnis could interact with each other.
							<br><br>
							The website is made for PROEP project.
						</p>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-6 col-md-offset-3 fh5co-widget">
						<h3>Learn More</h3>
						<ul class="fh5co-footer-links">
							<li><a href="{{ url('') }}">Home</a></li>
							<li><a href="{{ url('about') }}">About</a></li>
							<li><a href="{{ url('news') }}">News</a></li>
							@if(Auth::check())
								<li><a href="{{ url('discussions') }}">Discussions</a></li>
								<li><a href="{{ url('members') }}">Members</a></li>
							@endif
						</ul>
					</div>

					<div class="col-md-2 col-sm-4 col-xs-6 fh5co-widget">
						<h3>Social Media</h3>
						<ul class="fh5co-footer-links">
							<li><a href="https://www.facebook.com/FontysHogeschoolICT/">Facebook</a></li>
							<li><a href="https://twitter.com/ICT_Engineering">Twitter</a></li>
							<li><a href="https://www.instagram.com/fontyshogescholen/">Instagram</a></li>
						</ul>
					</div>

					<div class="col-md-2 col-sm-4 col-xs-6 fh5co-widget">
						<h3>Contact</h3>
						<ul class="fh5co-footer-links">
							<li>
								Phone: +31(0)8850 80000 <br>
								Whatsapp: +31 610176464
							</li>
							<br>
							<li>
								Rachelsmolen 1 <br>
								5612 MA, Eindhoven
							</li>
						</ul>
					</div>
				</div>

				<div class="row copyright">
					<div class="col-md-12 text-center">
						<p>
							<small class="block">
								&copy; 2018 Fontys University of Applied Sciences. All Rights Reserved.
							</small>
							<small class="block">
								Created by PROEP Group C Fall 2018.
							</small>
						</p>
					</div>
				</div>

			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="{{ URL::asset('public/js/jquery.min.js') }}"></script>
	<!-- jQuery Easing -->
	<script src="{{ URL::asset('public/js/jquery.easing.1.3.js') }}"></script>
	<!-- Summernote -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
	<!-- FOR IE9 below -->
	<!-- Bootstrap -->
	<script src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>
	<!-- Waypoints -->
	<script src="{{ URL::asset('public/js/jquery.waypoints.min.js') }}"></script>
	<!-- Stellar Parallax -->
	<script src="{{ URL::asset('public/js/jquery.stellar.min.js') }}"></script>
	<!-- Carousel -->
	<script src="{{ URL::asset('public/js/owl.carousel.min.js') }}"></script>
	<!-- Flexslider -->
	<script src="{{ URL::asset('public/js/jquery.flexslider-min.js') }}"></script>
	<!-- countTo -->
	<script src="{{ URL::asset('public/js/jquery.countTo.js') }}"></script>
	<!-- Magnific Popup -->
	<script src="{{ URL::asset('public/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ URL::asset('public/js/magnific-popup-options.js') }}"></script>
	<!-- Count Down -->
	<script src="{{ URL::asset('public/js/simplyCountdown.js') }}"></script>
	<!-- Main -->
	<script src="{{ URL::asset('public/js/main.js') }}"></script>
	<script>
		var d = new Date(new Date().getTime() + 1000 * 120 * 120 * 2000);

		// default example
		simplyCountdown('.simply-countdown-one', {
			year: d.getFullYear(),
			month: d.getMonth() + 1,
			day: d.getDate()
		});

		//jQuery example
		$('#simply-countdown-losange').simplyCountdown({
			year: d.getFullYear(),
			month: d.getMonth() + 1,
			day: d.getDate(),
			enableUtc: false
		});
	</script>
	@yield('js')
</body>

</html>