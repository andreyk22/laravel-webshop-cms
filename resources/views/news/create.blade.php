@extends('layouts.main')

@section('title')
    News
@endsection

@section('content')
<a href="/admin" class="btn btn-default" role="button">Go back</a>
<hr>
<div class="jumbotron">
    <h2 align="center" class="text text-muted">Create a new news post!</h2>
</div>
<div class="container">
<form action="{{ route('news.store') }}" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="form-group" >
                <label for="title">Title</label>
                <input type="text" name="title" value="" class="form-control" placeholder="Title">
        </div>
        <div class="form-group" >
                <label for="image">Image</label>
                <input type="file" id="image" name="image">
        </div>
    </div>
     <div class="row">
        <div class="form-group">
                <label for="body">Body</label>
                <textarea rows="5" name="body" value="" class="form-control" placeholder="Write news content in here."></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>
   
@endsection