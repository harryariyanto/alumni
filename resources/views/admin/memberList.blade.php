@extends('admin.master_admin')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Members             
            <button class="btn btn-primary" style="float:right;"  onclick="moveToInsertMemberPage()" >
            Insert Teacher
            </button>
            <a href="{{ url('/admin/download-excel') }}"><button class="btn btn-warning" style="float:right; margin-right: 10px">
            Download Excel Data
            </button></a>
            <button class="btn btn-secondary" style="float:right; margin-right: 10px" data-toggle="modal" data-target="#exampleModal">
            Upload Excel Data
            </button>
            </h1>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Approval List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table class="table  table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status/Year</th>
                                <th>Email</th>
                                <th>Date registered</th>
                                <th>Dataset</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($memberNeedApproval as $mem)
                            <tr>
                            <form method="post" action="../updateUserStatus/{{$mem->id}}">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                                <input type="hidden" value="{{$mem->id}}" name="iduser" />
                                <td>{{$mem->id}}</td>
                                <td>{{$mem->first_name}} {{$mem->last_name}}</td>
                                @if ($mem->year === 0)
                                    <td>Teacher</td>
                                @else
                                    <td>{{$mem->year}}</td>
                                @endif
                                <td>{{$mem->email}}</td>
                                <td>{{$mem->created_at}}</td>
                                <td>
                                @php ($match = 0)
                                @foreach($dataset as $data)
                                    @if($mem->first_name === $data->front_name && $mem->last_name === $data->last_name && $mem->year === $data->grad_year)
                                        @php ($match = 1)
                                        @break
                                    @else
                                        @php ($match = 0)
                                    @endif
                                @endforeach

                                @if($match === 1)
                                    <span style="color:green">Match</span>
                                @else
                                <span style="color:red">Not Match</span>
                                @endif
                                </td>
                                <td>
                                <button type="submit" class="btn btn-success" name="btnSubmit" value="1">Accept</button>
                                <button type="submit" class="btn btn-danger" name="btnSubmit" value="4">Reject</button>

                                </td>
                            </tr>
                            </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
<!-- /.row -->

<div class="row" style="margin-top:5%;">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Members List
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table class="table  table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status/Year</th>
                            <th>Email</th>
                            <th>Date registered</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($memberList as $mem)
                        @if ($mem->status=== 1 && $mem->year!= 0)
                        <tr>
                        <form method="post" action="../updateUserStatus/{{$mem->id}}">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                            <td>{{$mem->id}}</td>
                            <td>{{$mem->first_name}} {{$mem->last_name}}</td>
                                <td>{{$mem->year}}</td>
                            <td>{{$mem->email}}</td>
                            <td>{{$mem->created_at}}</td>
                            <td>
                            <button type="button" id="btnInfo" onclick="moveToDetail({{$mem->id}})" class="btn btn-info">Detail</button>
                                <button type="submit" class="btn btn-danger" name="btnSubmit" value="0">Disable</button>
                            </td>
                        </tr>
                        </form>
                        @endif
                        @endforeach

                        @foreach($memberList as $mem)
                        @if ($mem->status=== 0 && $mem->year!= 0)
                        <tr>
                        <form method="post" action="../updateUserStatus/{{$mem->id}}">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                            <td>{{$mem->id}}</td>
                            <td>{{$mem->first_name}} {{$mem->last_name}}</td>
                                <td>{{$mem->year}}</td>
                            <td>{{$mem->email}}</td>
                            <td>{{$mem->created_at}}</td>
                            <td>
                                <button type="button" id="btnInfo" onclick="moveToDetail({{$mem->id}})" class="btn btn-info">Detail</button>
                                <button type="submit" class="btn btn-success" name="btnSubmit" value="1">Enable</button>
                            </td>
                        </tr>
                        </form>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>

<div class="row" style="margin-top:5%;">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Teachers List
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table class="table  table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date registered</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($memberList as $mem)
                        @if ($mem->year=== 0 && $mem->status===1)
                        <tr>
                        <form method="post" action="../updateUserStatus/{{$mem->id}}">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                            <td>{{$mem->id}}</td>
                            <td>{{$mem->first_name}} {{$mem->last_name}}</td>
                            <td>{{$mem->email}}</td>
                            <td>{{$mem->created_at}}</td>
                            <td>
                            <button type="button" id="btnInfo" onclick="moveToDetail({{$mem->id}})" class="btn btn-info">Detail</button>
                                <button type="submit" class="btn btn-danger" name="btnSubmit" value="0">Disable</button>
                            </td>
                        </tr>
                        </form>
                        @endif
                        @endforeach

                        @foreach($memberList as $mem)
                        @if ($mem->year=== 0 && $mem->status===0)
                        <tr>
                        <form method="post" action="../updateUserStatus/{{$mem->id}}">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                            <td>{{$mem->id}}</td>
                            <td>{{$mem->first_name}} {{$mem->last_name}}</td>
                            <td>{{$mem->email}}</td>
                            <td>{{$mem->created_at}}</td>
                            <td>
                                <button type="button" id="btnInfo" onclick="moveToDetail({{$mem->id}})" class="btn btn-info">Detail</button>
                                <button type="submit" class="btn btn-success" name="btnSubmit" value="1">Enable</button>
                            </td>
                        </tr>
                        </form>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Upload Excel Data</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="{{ url('/admin/upload-excel') }}" method="post" enctype="multipart/form-data">
			<div class="modal-body">
					<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
					Select excel file:
					<input type="file" name="excel" id="excel">
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
function moveToDetail(id){
    window.location.href='detailUser/'+id;
}
function moveToInsertMemberPage(){
    window.location.href='insertUser/';
}
</script>
@endsection