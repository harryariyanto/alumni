@extends('admin.master_admin')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Forms</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create News
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="POST" action="{{route('createNews')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" placeholder="Enter Title" name="title">
                                </div>
                                <div class="form-group">
                                    <label>Text area</label>
                                    <textarea class="summernote" rows="3" placeholder="the content goes here" name="content"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image">
                                </div>
                                <button type="submit" class="btn btn-success">Submit </button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->

                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            placeholder: 'Hello bootstrap 4',
            tabsize: 2,
            height: 100
        });
    });
</script>
@endsection