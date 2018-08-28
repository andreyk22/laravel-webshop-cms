@extends('layouts.main')

@section('title')
    Admin - Mailing list
@endsection
@section('content')
<a href="/admin/" class="btn btn-default" role="button">Go back</a>
<h3 align="center">Mailing list</h3>
<hr>
<center>
@if (count($mails)>0)
<textarea rows="15" style="width:300px" class="form-control" id="comment">
    @foreach ($mails as $mail)
    {{$mail->email}}
    @endforeach
</textarea>
</center>


@else
<p>No mails found</p>
@endif
                   
@endsection

