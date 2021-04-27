@extends('layouts.blogcreate')

{{-- @section('title')

Add New Post

@endsection --}}

@section('content')
<center>
<form id="create-post" action="/create-post" method="post" enctype="multipart/form-data">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <input required="required" value="{{ old('title') }}" placeholder="Enter title here" type="text" name = "title" class="form-control" />
    </div>

    <div id="editor" class="form-group">

        content here


    </div>

    <div class="form-group row">
        <label for="gameimageid" class="col-sm-3 col-form-label">Thumbnail Image</label>
        <div class="col-sm-9">
            <input name="image" type="file" id="gameimageid" class="custom-file-input">
            <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
        </div>
    </div>

    <input type="hidden" name="body"/>
    <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>


</form>
</center>
@endsection