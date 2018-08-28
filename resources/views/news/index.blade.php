<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@extends('layouts.main')

@section('title')
    News
@endsection

@section('content')
   
    @if (count($posts)>0)
        @foreach($posts as $post)
        <div class="container">
            <div class="row">
                    <h3>{{$post->title}}</h3>
                    <hr>
                <span style="padding:15px;" class="pull-left">
                    <a href="/news/{{$post->id}}">
                    <img class="img-fluid" style="width:150px" src="{{asset('images/' . $post->imagePath)}}" alt=""></a><br><br>
                    <small><i>Published on:{{$post->created_at->toDateString()}}</i></small>
                </span>
                
                    <span>
                    <p>
                        {{ str_limit(strip_tags($post->body), 350) }}
                    </p>
                </span>
                <br>
                    @if (strlen(strip_tags($post->body)) > 350)
                            <br>
                            <a class="btn btn-success" href="/news/{{$post->id}}">Read more</a>
                    @endif
            </div>
            <hr>
            <br>
        </div>
        
        @endforeach
        @else
        <p>No news found</p>
    @endif

@endsection