@extends('layouts.main')

@section('title')
    About us
@endsection

@section('content')
<div class="container">
<div class="row well">
<h3 align="center">About us</h3>
</div>
<div class="row">
    <p>
        @foreach ($about as $ab)
        {{$ab->body}}
        @endforeach
    </p>
    </div>

</div>

@endsection