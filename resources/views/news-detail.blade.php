@extends('master')

@section('content')
<!-- <aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url({{ URL::asset('public/images/img_bg_4.jpg') }});">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1 class="heading-section">News</h1>
									<h2>Free html5 templates Made by <a href="http://freehtml5.co/" target="_blank">freehtml5.co</a></h2>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside> -->

<div id="fh5co-about">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img class="img-responsive" src="{{ URL::asset('public/image/news/'.$row->img_url) }}" alt="Free HTML5 Bootstrap Template">
			</div>
			<div class="col-md-6 animate-box">
				<h2>{{ $row->title }}</h2>
				{!! $row->content !!}
			</div>
		</div>
		<div class="row section">
			<div class="col-md-8 col-md-offset-2">
				<h3>Comments</h3>
				<div class="widget-area no-padding blank">
					@if(Auth::check())
					<!-- Comment Box -->
					<div class="comment-form">
						<form method="POST" action="{{route('createComment')}}">
							{{csrf_field()}}
							<textarea name="comment" placeholder="Insert your comment here"></textarea>
							<input name="id_news" type="hidden" value="{{$row->id_news}}">
							<button type="submit" class="btn btn-primary btn-comment pull-right">Post</button>
						</form>
					</div>
					@endif
					@if($comments==NULL)
						@if(Auth::check())<br>@endif
					No comments found for this news.
					@else
					@foreach($comments as $comment)
					<div class="panel panel-default comment-card">
						<img class="img-circle comment-image" src="{{ URL::asset($comment[0]->img_url) }}">
						<div class="panel-body">
							<div class="comment-info">
								<strong class="comment-user">{{$comment[0]->first_name}}</strong>
								commented on <span class="comment-time">{{$comment[1]->created_at}}</span>
							</div>
							<div class="comment-content">
								<p>{{$comment[1]->content}}</p>
							</div>
							@if(Auth::check())
							@if(Auth::user()->status==3||Auth::id()==$comment[0]->id)
							<form class="form-group" action="comment/delete/{{$comment[1]->id_ncomment}}" method="POST">
								{{csrf_field()}}
								{{ method_field('DELETE') }}
								<button class="btn-delete" type="submit"><i class="icon-trash"></i></button>
							</form>
							@endif
							@endif

						</div>
					</div>
					@endforeach
					@endif

					<!-- Comment List -->
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
