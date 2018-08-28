
@extends('layouts.main')

@section('title')
    Admin Panel - Create a new product
@endsection


@section('content')
<a href="/admin" class="btn btn-default" role="button">Go back</a>
<hr>
<div class="jumbotron">
    <h2 align="center" class="text text-muted">Create a new product!</h2>
</div>
<div class="container">
<form action="{{ route('admin.store') }}" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="form-group" >
                <label for="title">Product's title</label>
                <input type="text" name="title" value="" class="form-control" placeholder="Title">
        </div>
        <div class="form-group" >
                <label for="image">Product's image</label>
                <input type="file" id="image" name="image">
        </div>
        <div class="form-group" >
                <label for="price">Product's price</label>
                <input type="text" name="price" value="" class="form-control" placeholder="Enter product's price.">
        </div>
    </div>
     <div class="row">
        <div class="form-group">
                <label for="description">Product's description</label>
                <textarea rows="5" name="description" value="" class="form-control" placeholder="Write short product's description."></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>


@endsection
