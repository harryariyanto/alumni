@extends('master')

@section('content')
<!-- <h1> biljoancok</h1> -->
<form method="post">
<textarea id="summernote">biljoancok?</textarea>
</form>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            placeholder: 'Hello bootstrap 4',
            tabsize: 2,
            height: 100
        });
    });
</script>
@endsection
