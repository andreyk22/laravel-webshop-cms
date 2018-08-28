@extends('layouts.main')
@section('title')
    {{$post->title}}
@endsection

@section('content')
    <div class="container">
            <div class="row">
            <div class="col-md-7">
                    <p style="line-height: 1.6" class="text-muted">{{$post->body}}</p>
              </div>
              <div class="col-md-5" style="padding: 20px;">
                <img src="{{asset('images/' . $post->imagePath)}}"/>
              </div>
            </div>
    </div>
    <hr>
    <small class="pull-right">Written on: {{$post->created_at}}</small>

@endsection