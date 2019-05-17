@extends('admin.master_admin')
@section('content')
<div id="page-wrapper">
    <!-- Dashboard Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- End Dashboard Header -->

    <!-- Notifications card -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$alumnis->count()}}</div>
                            <div>Active Alumnis</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$teachers->count()}}</div>
                            <div>Active Teachers</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$news->count()}}</div>
                            <div>Active News</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$discussions->count()}}</div>
                            <div>Active Discussions</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Notifications card -->

    <!-- Panels -->
    <div class="row">
        <div class="col-lg-10">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-clock-o fa-fw"></i>About Page Content
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form method="post" action="{{ url('admin/about') }}">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <textarea  id="summernote" name="editordata"></textarea>
                        <button type="submit" name="btnSave" class="btn btn-success">Save</button>
                    <button type="button" id="btnClear" name="btnClear" class="btn btn-danger">Clear</button>

                    </form>
                </div>
            </div>
        </div>
    
    </div>
    <!-- End Panels -->
</div>
@endsection

@section('js')
<script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 300
            });
            var content={!! json_encode($about->content) !!};
            $('#summernote').summernote('code',content);

        });
        $('#btnClear').click(function () {
            $('#summernote').summernote('code','');

        });
    </script>
@endsection