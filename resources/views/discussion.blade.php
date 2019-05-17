@extends('master')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		@if(Auth::check())
			@if(Auth::user()->status === 1)
			<!--admin-->
				<form role="form" method="POST" action="{{url('discussions/create')}}">
				{{csrf_field()}}
						<div class="form-group">
								<label>Title</label>
								<input class="form-control" placeholder="Enter Title" name="title">
						</div>
						<div class="form-group">
								<label>Text area</label>
								<textarea class="summernote" rows="3" placeholder="the content goes here" name="content"></textarea>
						</div>
						<button type="submit" class="btn btn-success">Submit </button>
						<button type="reset" class="btn btn-danger">Reset </button>
				</form>
				@else
					<!--user-->
					<form role="form" method="POST" action="{{url('discussions/create')}}">
					{{csrf_field()}}
							<div class="form-group">
									<label>Title</label>
									<input class="form-control" placeholder="Enter Title" name="title">
							</div>
							<div class="form-group">
									<label>Text area</label>
									<textarea class="summernote" rows="3" placeholder="the content goes here" name="content"></textarea>
							</div>
							<button type="submit" class="btn btn-success">Submit </button>
							<button type="reset" class="btn btn-danger">Reset </button>
					</form>
			@endif
		@else
					<h3> <a href="{{url('/login')}}">Login</a> or <a href="{{url('/register')}}">Register</a> to Post Discussion! </h3>
		@endif
	</div>
	<div id="fh5co-blog">
		<div class="container">
			<div class="row row-padded-mb">
				@foreach($discussions as $discussion)
					<div class="col-md-8 col-md-offset-2 animate-box">
						<div class="fh5co-event discussion-card">
							<div class="date text-center">
								<img class="img-responsive img-circle" src="{{ $discussion->img_url }}">
							</div>
							<form method="post" action="discussions/delete">
								{{csrf_field()}}
								<p class="discussion-date">{{$discussion->created_at}}</p>
								@if(Auth::check())
									@if(Auth::user()->status === 3)
										<!--admin-->
										<input type="hidden" name="id" value="{{$discussion->id_discussions}}">
										<button class="btn-delete" type="submit" name="btnSubmit" value="4"><i class="icon-trash"></i></button>
									@elseif(Auth::user()->id == $discussion->id_user)
										<input type="hidden" name="id" value="{{$discussion->id_discussions}}">
										<button class="btn-delete" type="submit" name="btnSubmit" value="4"><i class="icon-trash"></i></button>
									@endif
								@endif
								<h3 class="discussion-title"><a href="{{ url('discussions/'.$discussion->id_discussions) }}">{{ $discussion->title }}</a></h3>
								<p class="discussion-pr	eview">{!!$discussion->content!!}</p>
								<p><a href="{{ url('discussions/'.$discussion->id_discussions) }}">Read More</a></p>
							</form>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection


@section('js')
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            placeholder: 'Insert your Text Here',
            tabsize: 2,
            height: 100
        });
    });
</script>
@endsection
