
@extends('layouts.main')

@section('title')
    Admin Panel - Create a new product
@endsection


@section('content')
<a href="/admin" class="btn btn-default" role="button">Go back</a>
<hr>
<div class="jumbotron">
    <h2 align="center" class="text text-muted">Create a new admin user!</h2>
</div>
<div class="container">
<form action="{{ route('admin.addadmin') }}" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="form-group">
            <label for="admin_name"> New admin user name:</label>
            <input type="text" name="admin_name" value="" class="form-control" placeholder="Name">
        </div>
        <div class="form-group" >
                <label for="admin_mail">New admin user email:</label>
                <input type="text" name="admin_mail" value="" class="form-control" placeholder="email address">
        </div>
        <div class="form-group" >
                <label for="admin_pass">New admin user password:</label>
                <input type="password" name="admin_pass" value="" class="form-control">
        </div>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>


@endsection
