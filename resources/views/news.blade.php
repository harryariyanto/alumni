@extends('master')

@section('content')
	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url({{ URL::asset('public/images/news_bg.jpg') }});">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center slider-text">			   			
			   				<div class="slider-text-inner">
			   					<h1 class="heading-section">News</h1>
								<h2>All the new things happening at Fontys.</h2>
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
			<div class="row">
			@foreach($rows as $news)
			@if($news->status==1)
				<div class="col-md-6 animate-box">
					<div class="course">
						<a href="{{ url('news/'.$news->id_news) }}"" class="course-img" style="background-image: url('{{ URL::asset('public/image/news/'.$news->img_url) }}');">
						</a>
						<div class="desc">
							<h3><a href="{{ url('news/'.$news->id_news) }}">{{$news->title}}</a></h3>
							{{str_limit(strip_tags($news->content),80)}}
							<br>
							<br>
							<span><a href="{{ url('news/'.$news->id_news) }}" class="btn btn-primary btn-sm btn-course">Read More</a></span>
						</div>
					</div>
				</div>
				@endif
				@endforeach
			</div>
		</div>
	</div>
@endsection
@section('js')
	$(document)
@endsection

