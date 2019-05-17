@extends('master')

@section('content')	
	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url({{ URL::asset('public/images/profile_bg.jpg') }});">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1 class="heading-section">Profile</h1>
									<h2>Your profile page</h2>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>
	
	<div id="fh5co-staff">
		<div class="container">
			<div class="row" id="members">
					<div class="col-md-3 text-center">
						<div class="staff">
							<div class="staff-img" style="background-image: url('{{ $row->img_url }}');">
								<ul class="fh5co-social">
									<li><a href="#" data-toggle="modal" data-target="#exampleModal"><span class="fas fa-camera" style="font-size: 3em !important"></span>
										Change Picture</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h3>Edit your profile</h3>
						<form action="{{ url('update-profile') }}" method="post">
							<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
							First Name:
							<input type="text" name="first_name" id="first_name" class="form-control" value="{{ $row->first_name }}" placeholder="Your First Name" required><br/>
							Last Name:
							<input type="text" name="last_name" id="last_name" class="form-control" value="{{ $row->last_name }}" placeholder="Your Last Name" required><br/>
							Email:
							<input type="email" name="email" id="email" class="form-control" value="{{ $row->email }}" placeholder="Your Email" required><br/>
							@if ($row->year === 0)
								Role:
								<select name="year" id="year" class="form-control" readonly required>
									<option value="0">Teacher</option>
								</select><br/>
							@else
								Graduation Year:
								<select name="year" id="year" class="form-control" required>
									<option value="0">Select Graduation Year: </option>
									@for ($i = 1996; $i <= date('Y'); $i++)
										@if ($i === $row->year)
											<option value="{{ $i }}" selected="selected">{{ $i }}</option>
										@else
											<option value="{{ $i }}">{{ $i }}</option>
										@endif
									@endfor
								</select><br/>
							@endif
							LinkedIn URL:
							<input type="text" name="link" id="link" class="form-control" value="{{ $row->link }}" placeholder="Your LinkedIn URL" required><br/>
							<button type="submit" id="submit" name="submit" class="btn btn-success">Update Data</button>
						</form><br/>
						<h3>Change your password</h3>
						<form action="{{ url('change-password') }}" method="post">
							<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
							Old Password:
							<input type="password" name="old_password" id="old_password" class="form-control" value="" placeholder="Your Old Password" required><br/>
							New Password:
							<input type="password" name="new_password" id="new_password" class="form-control" value="" placeholder="Your New Password" required><br/>
							Confirm New Password:
							<input type="password" name="confirm_password" id="confirm_password" class="form-control" value="" placeholder="Confirm Your New Password" required><br/>
							<button type="submit" id="submit" name="submit" class="btn btn-warning">Change Password</button>
						</form>
					</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Change Profile Picture</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="{{ url('upload-picture') }}" method="post" enctype="multipart/form-data">
			<div class="modal-body">
					<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
					Select picture:
					<input type="file" name="picture" id="picture">
			</div>
			<div class="modal-footer">
				<button type="submit" name="submit" id="submit" class="btn btn-success">Save</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</form>
		</div>
	</div>
	</div>
@endsection

@section('js')
	<script>
		$(document).ready(function(){
			@if(Session::has('pass'))
				alert("{{ Session::get('pass') }}");
				{{ Session::forget('pass') }}
			@endif
			$('#myModal').on('shown.bs.modal', function () {
				$('#myInput').trigger('focus')
			})
		});
	</script>
@endsection
