@extends('layouts.blogcreate')

{{-- @section('title')

Add New Post

@endsection --}}

@section('content')

<div id="form-wrap" class="flex justify-center">
    <form id="create-post" action="/update-post" method="post" enctype="multipart/form-data" class="max-w-2xl w-full m-6">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <h1 class="text-2xl text-blue-800 mb-7">Let's EDIT a Post!</h1>
        <div class="form-group mb-5">
            <input required="required" value="{{ $post->title }}" placeholder="Post Title" type="text" name ="title" class="form-control" />
        </div>

        <div id="editor" class="form-group max-h-72 mb-5 bg-white" >

            {!! $post->body !!}

        </div>

        <div class="p-6 my-6 border border-gray-400">
            <p>Current image thumbnail:</p>
            <img class="object-scale-down h-48" src="{{ Storage::url($post->image_path) }}"">
            <p> ( {{ Storage::url($post->image_path) }})</p>
        </div>

        
        <label for="gameimageid" class="py-2 block">Change associated image ...</label>
        <input required="required" name="image" value="{{$post->image_path}}" title=" " type="file" id="gameimageid" accept=".jpg, .jpeg, .png" class="w-full font-bold bg-white rounded ">
       
        

        <input type="hidden" name="body"/>
        <input type="hidden" name="post_id" value="{{ $post->id }}"/>
       
        <div class="flex justify-end">
            <input type="submit" name='publish' class="mt-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="Publish"/>
        </div>

        

    </form>


    
    {{-- <div>
        <h1>Quill HTML</h1>
        <div id="quillhtml"></div>
        <button id="htmlit">yeah</button>
    </div> --}}
</div>






@endsection
