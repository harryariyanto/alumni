<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fontys Alumni</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    
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
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
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

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
