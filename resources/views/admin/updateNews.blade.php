@extends('admin.master_admin')
@section('content')

<!-- @if(isset($success))
<div class="alert alert-primary" role="alert">
  This is a primary alert—check it out!
</div>
@endif -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update News</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update News
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="POST" action="{{route('updateNewsPut')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="hidden" name="id" value="{{$news->id_news}}">

                                    <input class="form-control" placeholder="Enter Title" name="title" value="{{$news->title}}">
                                </div>
                                <div class="form-group">
                                    <label>Text area</label>
                                    <textarea class="summernote" rows="3" placeholder="the content goes here" name="content"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Current Image:</label>
                                    <br>
                                <img class="img-fluid" src="{{ URL::asset('public/image/news/'.$news->img_url) }}"height="200"width="200">
                                <br>
                                <label>To update :</label>
                                  
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
            tabsize: 2,
            height: 100
        });
        var content={!!json_encode($news->content)!!};
        $('.summernote').summernote('code',content);
    });
</script>
@endsection
