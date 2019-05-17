@extends('admin.master_admin')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">News            
            <button class="btn btn-primary" style="float:right;"  onclick="moveToInsertNewsPage()" >
            Insert News
            </button>
            </h1>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

<div class="row" style="margin-top:5%;">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                News List
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table class="table  table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Created By</th>
                            <th>Created at</th>
                            <th>Last Updated at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $mem)
                        @if ($mem->status=== 1)
                        <tr>
                        <form method="post" action="news/updateNewsStatus">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <input type="hidden" name="id" value="{{$mem->id_news}}">
                            <td>{{$mem->id_news}}</td>
                            <td>{{$mem->title}}</td>
                            <td></td>
                            <td>{{$mem->created_at}}</td>
                            <td>{{$mem->updated_at}}</td>
                            <td>
                            <button type="button" id="btnInfo" onclick="moveToDetail({{$mem->id_news}})" class="btn btn-info">Edit</button>
                            <button type="submit" class="btn btn-danger" name="btnSubmit" value="0">Disable</button>
                            </td>
                        </tr>
                        </form>
                        @endif
                        @endforeach
                        @foreach($news as $mem)
                        @if ($mem->status=== 0)
                        <tr>
                        <form method="post" action="news/updateNewsStatus">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <input type="hidden" name="id" value="{{$mem->id_news}}">
                            <td>{{$mem->id_news}}</td>
                            <td>{{$mem->title}}</td>
                            <td></td>
                            <td>{{$mem->created_at}}</td>
                            <td>{{$mem->updated_at}}</td>
                            <td>
                            <button type="button" id="btnInfo" onclick="moveToDetail({{$mem->id_news}})" class="btn btn-info">Edit</button>
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

@endsection
@section('js')
<script>
function moveToDetail(id){
    window.location.href='news/update/'+id;
}
function moveToInsertNewsPage(){
    window.location.href='news/create';
}
</script>
@endsection