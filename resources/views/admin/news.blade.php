<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@extends('layouts.main')

@section('title')
    Admin - News management
@endsection
@section('content')
<div class="row">
        <a href="/admin/" class="btn btn-default" role="button">Go back</a>
        <a href="/news/create" class="btn btn-success" role="button">Create new post</a>
</div>

<h2 align="center">News management</h2>
<br>
<hr>
    @if (count($posts)>0)
        @foreach($posts as $post)
            <div class="container">
               <div class="row">
                  
                       <div class="col pull-left">
                           <h3>{{$post->title}}</h3>
                       </div>
                       <div class="pull-right">
                            <ul class="list-inline">
                                    <li class="list-inline-item"><a href="/news/{{$post->id}}}/edit" class="btn btn-warning" role="button">Update post</a></li>
                                <li class="list-inline-item">
                                    <form action="{{route('news.destroy', $post->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-danger">Delete post</button>
                                </form>
                                </li>
                            </ul>
                       </div>
               </div>
               <hr>
            </div> 

        @endforeach
        @else
        <p>No news found</p>
    @endif
                   
@endsection