@extends('master')

@section('content')
	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url({{ URL::asset('public/images/404_bg.jpg') }});">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center slider-text">			   			
			   				<div class="slider-text-inner">
			   					<h1 class="heading-section">Error 404</h1>
			   					<h2>Sorry, the page you are looking for is not found.</h2>
							</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>
@endsection