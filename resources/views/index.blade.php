@extends('master')

@section('content')
	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url({{ URL::asset('public/images/index_bg_2.jpg') }});">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1>#wijzijnfontys</h1>
									<h2>We are Fontys alumni!</h2>
									@if(!Auth::check())
									<p><a class="btn btn-primary btn-lg" href="{{ url('register') }}">Register Now</a></p>
									@endif
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url({{ URL::asset('public/images/index_bg_1.jpg') }});">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1>A place where young professional meets</h1>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url({{ URL::asset('public/images/index_bg_3.jpg') }});">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Discuss, meet, and work together as Fontys alumnis!</h1>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>		   	
		  	</ul>
	  	</div>
	</aside>

<div id="fh5co-course">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>News</h2>
					<!-- <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p> -->
				</div>
			</div>
			<div class="row">
				@foreach($news as $n)
				<div class="col-md-6 animate-box">
					<div class="course">
						<a href="{{ url('news/'.$n->id_news) }}" class="course-img" style="background-image: url('{{ URL::asset('public/image/news/'.$n->img_url) }}');"></a>
						<div class="desc">
							<h3><a href="{{ url('news/'.$n->id_news) }}">{{$n->title}}</a></h3>
							{{str_limit(strip_tags($n->content),80)}}
							<br><br>
							<span><a href="{{ url('news/'.$n->id_news) }}" class="btn btn-primary btn-sm btn-course">Read More</a></span>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>

	@if(Auth::check())
	<div id="fh5co-blog">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Discussions</h2>
				</div>
			</div>
			<div class="row row-padded-mb">
				@foreach($discussions as $d)
				@if($d->status==1)
				<div class="col-md-4 animate-box">
					<div class="fh5co-event">
						<div class="date text-center">
							<span>{{date("d M", strtotime($d->created_at))}}</span>
						</div>
						<h3><a href="#">{{$d->title}}</a></h3>
						{!!str_limit($d->content,100)!!}
						<p><a href="{{ url('discussions/'.$d->id_discussions) }}">Read More</a></p>
					</div>
				</div>
				@endif
				@endforeach
			</div>
		</div>
	</div>
	@endif
	

	<div id="fh5co-counter" class="fh5co-counters" style="background-image: url({{ URL::asset('public/images/img_bg_4.jpg') }});" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-world"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="23" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Years of Service</span>
						</div>
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-study"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="3705" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Students Enrolled</span>
						</div>
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-head"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="82" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Experienced Teachers</span>
						</div>
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-book"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="221" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Courses Offered</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	@if (Session::has('message'))
		<script>
			$(document).ready(function(){
				alert("{{ Session::get('message') }}");
			});
		</script>
		{{ Session::forget('message') }}
	@endif
@endsection

