
@extends('layouts.main')

@section('title')
    Admin Panel - Edit product
@endsection


@section('content')
<a href="/admin" class="btn btn-default" role="button">Go back.</a></li>
<hr>
<div class="jumbotron">
    <h2 align="center" class="text text-muted">EDIT product!</h2>
</div>
<div class="container">
<form action="{{route('admin.update', $product->id) }}" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
       <div class="col-md-8">
    <div class="row">
            <div class="col-md-8">
        <div class="form-group" >
                <label for="title">Product's title</label>
        <input type="text" name="title" value="{{$product->title}}" class="form-control" placeholder="Title">
        </div>
        <div class="form-group" >
                <label for="imgpath">Replace product's image</label>
                <input type="file" id="image" name="image">
        </div>
        <div class="form-group" >
                <label for="price">Product's price</label>
        <input type="text" name="price" value="{{$product->price}}" class="form-control" placeholder="Enter product's price.">
        </div>
        <div class="form-group">
                <label for="description">Product's description</label>
                <textarea rows="10" style="width:100%" name="description" class="form-control">{{$product->description}}</textarea>
            </div>
            <input type="hidden" name="_method" value="PUT">
    <button type="submit" class="btn btn-success">Submit</button>
            
    </div>
            
    </div>
    
</div>
    <div class="col-md-4">
        <h4 align="right"><i>Current product's image</i></h4>
        <hr>
            <img class="pull-right" src="{{asset('images/' . $product->imagePath)}}"/>
    </div>
    
    {{-- <input type="hidden" name="_method" value="PUT">
    <button type="submit" class="btn btn-success">Submit</button> --}}
</form>
</div>


@endsection
