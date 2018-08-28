
@extends('layouts.main')

@section('title')
    Admin - Edit about page
@endsection


@section('content')
<a href="/admin" class="btn btn-default" role="button">Go back.</a></li>
<hr>
<div class="jumbotron">
    <h2 align="center" class="text text-muted">EDIT about page!</h2>
</div>
<div class="container">
<form action="{{route('admin.updateaboutpage', $about->id) }}" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
       
        <div class="form-group" >
                
                <textarea id="article-ckeditor" type="text" name="body" class="form-control">{{$about->body}} </textarea>
      
        </div>
       
            <input type="hidden" name="_method" value="PUT">
    <button type="submit" class="btn btn-success">Submit</button>
            
    </div>
    
    {{-- <input type="hidden" name="_method" value="PUT">
    <button type="submit" class="btn btn-success">Submit</button> --}}
</form>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>


@endsection
