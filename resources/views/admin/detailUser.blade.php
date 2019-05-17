@extends('admin.master_admin')
@section('content')
<div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User Detail
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                <div class="col-lg-6">
                <h4>Full Name</h4>
                <h2>{{$user->first_name}} {{$user->last_name}}</h2>
                </div>
                <div class="col-lg-6">
                <h4>Email</h4>
                <h2>{{$user->email}}</h2>
                </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
@endsection