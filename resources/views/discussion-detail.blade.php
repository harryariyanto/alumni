@extends('master')

@section('content')
	<div id="fh5co-about">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-md-offset-2">
					<img class="img-responsive img-circle" src="../{{ $discussion->img_url }}">
				</div>
				<div class="col-md-6 animate-box">
					<p class="comment-info">
						<strong class="comment-user">{{ $discussion->first_name }} {{ $discussion->last_name }}</strong>
						posted on <span class="comment-time">{{$discussion->created_at}}</span>
					</p>
					<h2>{{ $discussion->title }}</h2>
					<p>{!!$discussion->content!!}</p>
				</div>
			</div>
			<div class="row section">
				<div class="col-md-8 col-md-offset-2">
					<h3>Comments</h3>
					<div class="widget-area no-padding blank">
						<!-- Comment Box -->
						@if(Auth::check())
							@if(Auth::user()->status === 1)
								<div class="comment-form">
									<form method="post" action="{{url('discussions/createComment/'.$discussion->id_discussions)}}">
										{{ csrf_field() }}
										<textarea name="content" placeholder="Insert your comment here"></textarea>
										<button type="submit" class="btn btn-primary btn-comment pull-right">Post</button>
									</form>
								</div>
							@else
								<div class="comment-form">
									<form method="post" action="{{url('discussions/createComment/'.$discussion->id_discussions)}}">
										{{ csrf_field() }}
										<textarea name="content" placeholder="Insert your comment here"></textarea>
										<button type="submit" class="btn btn-primary btn-comment pull-right">Post</button>
									</form>
								</div>
							@endif
						@endif
						<!-- Comment List -->
						@if($row == NULL)
							@if(Auth::check())<br>@endif
							No comments found for this discussion.
						@else
							@foreach($row as $row)
							<div class="panel panel-default comment-card">
								<img class="img-circle comment-image" src="../{{$row->img_url}}">
								<div class="panel-body">
									<div class="comment-info">
										<strong class="comment-user">{{ $row->first_name }} {{ $row->last_name }}</strong>
										commented on <span class="comment-time">{{ $row->created_at }}</span>
										<form method="post" action="deleteComment">
											{{csrf_field()}}
											@if(Auth::check())
												@if(Auth::user()->status === 3)
													<input type="hidden" name="id" value="{{$discussion->id_discussions}}">
													<input type="hidden" name="comment_id" value="{{$row->id_dcomment}}">
													<button class="btn-delete" type="submit" name="btnSubmit" value=""><i class="icon-trash"></i></button>
												@elseif(Auth::user()->id === $row->id_user)
													<input type="hidden" name="id" value="{{$discussion->id_discussions}}">
													<input type="hidden" name="comment_id" value="{{$row->id_dcomment}}">
													<button class="btn-delete" type="submit" name="btnSubmit" value=""><i class="icon-trash"></i></button>
												@endif
											@endif
									</div>
									<div class="comment-content">
										{{$row->content}}
									</div>

								</div>
							</div>
							@endforeach
						@endif
				</div>
			</div>
		</div>
	</div>
@endsection
