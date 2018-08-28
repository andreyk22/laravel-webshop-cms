
@extends('layouts.main')

@section('title')
    Admin Panel - Dashboard
@endsection

@section('content')
<a href="/admin" class="btn btn-default" role="button">Go back</a>
<hr>
<div class="container">
        
        <ul class="list-inline">
                <li class="list-inline-item"><a href="/admin/show/{{$product->id}}}/edit" class="btn btn-warning" role="button">Update product</a></li>
            <li class="list-inline-item">
                <form action="{{route('admin.destroy', $product->id) }}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger">Delete product</button>
            </form>
            </li>
        </ul>
        
        <div style="padding:50px;" class="row">
               <p>Title:</p> <h1>{{$product->title}}</h1>
        </div>
        <div class="row" style="padding-left:50px;">
               <span><p>Price:</p> <h1 class="text text-danger"> {{$product->price}}$</h1></span>
        </div>
        <div class="row">
            <br>
            <p style="padding-left:50px;">Description:</p>
            <div class="col-md-8" style="padding-top:30px;">
                <div class="pull-left">{{$product->description}}</div>
            </div>
            <div class="col-md-4">
            <img class="pull-right" src="{{asset('images/' . $product->imagePath)}}"/>
            </div>
        </div>
        
</div>
 
@endsection