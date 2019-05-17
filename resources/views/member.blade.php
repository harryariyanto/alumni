@extends('master')

@section('content')	
	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url({{ URL::asset('public/images/members_bg.jpg') }});">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center slider-text">			   			
			   				<div class="slider-text-inner">
			   					<h1 class="heading-section">Members</h1>
									<h2>All members of Fontys alumni</h2>
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
			<div class="row">
				<div class="col-md-6">
					<label for="filterByStatus" class="col-md-4 control-label">Filter By Category</label>
					<select name="filterByStatus" id="filterByStatus" class="form-control" onchange="filterByStatus(this.value)">
						<option value="-">Select Category</option>
						<option value="teacher">Teacher</option>
						<option value="student">Student</option>
					</select>
				</div>
				<div class="col-md-6">
					<label for="filterByYear" class="col-md-4 control-label">Filter By Year</label>
					<select name="filterByYear" id="filterByYear" class="form-control" onchange="filterByYear(this.value)" disabled="disabled">
						<option value="-">Select Year</option>
						@for ($i = 1996; $i <= date('Y'); $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
					</select>
				</div>
			</div><br/>
			<div class="row" id="members">
				@foreach($res as $row)
				@if($row->status!=3)
					<div class="col-md-3 text-center">
						<div class="staff">
							<div class="staff-img" style="background-image: url('{{ $row->img_url }}');">
								<ul class="fh5co-social">
									<li><a href="{{ $row->link }}"><span class="fab fa-linkedin" style="font-size: 3em !important"></span></i></a></li>
								</ul>
							</div>
							<!-- <span>Health Teacher</span> -->
							<h3>{{ $row->first_name }} {{ $row->last_name }}</h3>
							@if ($row->year === 0)
								<p>Teacher</p>
							@else
								<p>Alumni {{ $row->year }}</p>
							@endif
						</div>
					</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script>
		function filterByStatus(status){
			var line = "";
			if (status == "teacher" || status == "-"){
				$('#filterByYear').attr('disabled','disabled');
			} else {
				$('#filterByYear').removeAttr('disabled');
			}

			if (status != "-"){
				$.ajax({
					url: 'filter-category',
					type: 'GET',
					data: {
						category: status
					},
					success: function(result){
						$.each(JSON.parse(result), function(index, row){
							// alert(row.img_url);
							line = line + "<div class='col-md-3 text-center'><div class='staff'><div class='staff-img' style='background-image: url("+row.img_url+");'><ul class='fh5co-social'><li><a href='"+row.link+"'><span class='fab fa-linkedin' style='font-size: 3em !important'></span></i></a></li></ul></div><!-- <span>Health Teacher</span> --><h3>"+row.first_name+" "+row.last_name+"</h3>";
							if (row.year == 0){
								line = line + "<p>Teacher</p>";
							} else {
								line = line + "<p>Alumni "+row.year+"</p>";
							}
							
							line = line + "</div></div>";
						});
						$('#members').html(line);
					}
				});
			} else {
				$.ajax({
					url: 'filter-category',
					type: 'GET',
					data: {
						category: status
					},
					success: function(result){
						$.each(JSON.parse(result), function(index, row){
							// alert(row.img_url);
							line = line + "<div class='col-md-3 text-center'><div class='staff'><div class='staff-img' style='background-image: url("+row.img_url+");'><ul class='fh5co-social'><li><a href='"+row.link+"'><span class='fab fa-linkedin' style='font-size: 3em !important'></span></i></a></li></ul></div><!-- <span>Health Teacher</span> --><h3>"+row.first_name+" "+row.last_name+"</h3>";
							if (row.year == 0){
								line = line + "<p>Teacher</p>";
							} else {
								line = line + "<p>Alumni "+row.year+"</p>";
							}
							
							line = line + "</div></div>";
						});
						$('#members').html(line);
					}
				});
			}
		}

		function filterByYear(year){
			var line = "";

			$.ajax({
				url: 'filter-year',
				type: 'GET',
				data: {
					year: year
				},
				success: function(result){
					$.each(JSON.parse(result), function(index, row){
						line = line + "<div class='col-md-3 text-center'><div class='staff'><div class='staff-img' style='background-image: url("+row.img_url+");'><ul class='fh5co-social'><li><a href='"+row.link+"'><span class='fab fa-linkedin' style='font-size: 3em !important'></span></i></a></li></ul></div><!-- <span>Health Teacher</span> --><h3>"+row.first_name+" "+row.last_name+"</h3>";
						if (row.year == 0){
							line = line + "<p>Teacher</p>";
						} else {
							line = line + "<p>Alumni "+row.year+"</p>";
						}
						
						line = line + "</div></div>";
					});
					$('#members').html(line);
				}
			});
		}
	</script>
@endsection
