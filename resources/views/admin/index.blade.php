
@extends('layouts.main')

@section('title')
    Admin Panel - Dashboard
@endsection

@section('content')
<div class="jumbotron">
<h2 align="center">Welcome to admin panel <b>{{ Auth::user()->name }}</b></h2>
    <h3 align="center">Products management</h3>
</div>
    <div class="container-fluid">
        <div class="row">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="/admin" class="btn btn-info" role="button">Dashboard</a></li>
                <li class="list-inline-item"><a href="/admin/create-product" class="btn btn-success" role="button">Create new product</a></li>
                <li class="list-inline-item"><a href="/admin/news" class="btn btn-success" role="button">Manage news</a></li>
                <li class="list-inline-item"><a href="/admin/mails" class="btn btn-success" role="button">Mailing list</a></li>
                <li class="list-inline-item"><a href="/admin/newadmin" class="btn btn-success" role="button">Create admin user</a></li>
                <li class="list-inline-item"><a href="/admin/orders" class="btn btn-success" role="button">Orders</a></li>
                <li class="list-inline-item"><a href="/admin/edit-about-page/1}/" class="btn btn-success" role="button">Edit about page</a>
            </ul>
            <br>
        </div>
    </div>
    <hr>
    <div class="container">
        
            <h3 align="center">Products management</h3>
            <hr>
        
            @if(count($products) > 0)
                @foreach ($products as $product)
                    
                        <div class="row">
                            <div class="col pull-left"> 
                                <h3><a href="/admin/show/{{$product->id}}">{{$product->title}}</a></h3>
                            </div>
                       <div class="col pull-right">
                        <ul class="list-inline pull-right">
                                <li class="list-inline-item"><a href="/admin/show/{{$product->id}}}/edit" class="btn btn-warning" role="button">Update product</a></li>
                            <li class="list-inline-item">
                                <form action="{{route('admin.destroy', $product->id) }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-danger">Delete product</button>
                            </form>
                            </li>
                        </ul>
                    </div>
                    <br>
                    <hr>
                </div>
               
                @endforeach
           @else
                <h2>No products found!</h2>
           @endif
          
       
       {{ $products->links() }}
  
   </div>
@endsection