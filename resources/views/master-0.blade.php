 <!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Fontys Alumni</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
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
	<!-- Modernizr JS -->
	<script src="{{ URL::asset('public/js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

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
						<p class="num">+31 8850 80000 </p>
						<ul class="fh5co-social">
							<li><a href="#"><i class="icon-facebook2"></i></a></li>
							<li><a href="#"><i class="icon-twitter2"></i></a></li>
							<li><a href="#"><i class="icon-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="index.html"><i class="icon-study"></i>Educ<span>.</span></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li class="{{ Request::path() ==  '/' ? 'active' : ''  }}">
								<a href="{{ url('') }}">Home</a></li>
							<li class="{{ Request::path() ==  'about' ? 'active' : ''  }}">
								<a href="{{ url('about') }}">About</a></li>
							<li class="{{ Request::path() ==  'news' ? 'active' : ''  }}">
								<a href="{{ url('news') }}">News</a></li>
							<li class="{{ Request::path() ==  'discussions' ? 'active' : ''  }}">
								<a href="{{ url('discussions') }}">Discussions</a></li>							
							<li class="{{ Request::path() ==  'members' ? 'active' : ''  }}">
								<a href="{{ url('members') }}">Members</a></li>
															
							<!-- <li class="has-dropdown {{ Request::path() ==  'blog' ? 'active' : ''  }}">
								<a href="{{ url('blog') }}">Blog</a>
								<ul class="dropdown">
									<li><a href="#">Web Design</a></li>
									<li><a href="#">eCommerce</a></li>
									<li><a href="#">Branding</a></li>
									<li><a href="#">API</a></li>
								</ul>
							</li> -->

							<li class="btn-cta">
								<a href="{{ url('login') }}"><span>Log In</span></a></li>
							<li class="btn-cta">
								<a href="{{ url('register') }}"><span>Register</span></a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	<div id="yield-content">
		@yield('content')
	</div>

	<div id="fh5co-register" style="background-image: url({{ URL::asset('public/images/img_bg_2.jpg') }});">
		<div class="overlay"></div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 animate-box">
				<div class="date-counter text-center">
					<h2>Get 400 of Online Courses for Free</h2>
					<h3>By Mike Smith</h3>
					<div class="simply-countdown simply-countdown-one"></div>
					<p><strong>Limited Offer, Hurry Up!</strong></p>
					<p><a href="#" class="btn btn-primary btn-lg btn-reg">Register Now!</a></p>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-gallery" class="fh5co-bg-section">
		<div class="row text-center">
			<h2><span>Instagram Gallery</span></h2>
		</div>
		<div class="row">
			<div class="col-md-3 col-padded">
				<a href="#" class="gallery" style="background-image: url({{ URL::asset('public/images/project-5.jpg') }});"></a>
			</div>
			<div class="col-md-3 col-padded">
				<a href="#" class="gallery" style="background-image: url({{ URL::asset('public/images/project-2.jpg') }});"></a>
			</div>
			<div class="col-md-3 col-padded">
				<a href="#" class="gallery" style="background-image: url({{ URL::asset('public/images/project-3.jpg') }});"></a>
			</div>
			<div class="col-md-3 col-padded">
				<a href="#" class="gallery" style="background-image: url({{ URL::asset('public/images/project-4.jpg') }});"></a>
			</div>
		</div>
	</div>

	<footer id="fh5co-footer" role="contentinfo" style="background-image: url({{ URL::asset('public/images/img_bg_4.jpg') }});">
		<div class="overlay"></div>
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-3 fh5co-widget">
					<h3>About Education</h3>
					<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Learning</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Course</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Meetups</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Learn &amp; Grow</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Blog</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Testimonials</a></li>
						<li><a href="#">Handbook</a></li>
						<li><a href="#">Held Desk</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Engage us</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Marketing</a></li>
						<li><a href="#">Visual Assistant</a></li>
						<li><a href="#">System Analysis</a></li>
						<li><a href="#">Advertise</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Legal</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Find Designers</a></li>
						<li><a href="#">Find Developers</a></li>
						<li><a href="#">Teams</a></li>
						<li><a href="#">Advertise</a></li>
						<li><a href="#">API</a></li>
					</ul>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> &amp; <a href="https://www.pexels.com/" target="_blank">Pexels</a></small>
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

