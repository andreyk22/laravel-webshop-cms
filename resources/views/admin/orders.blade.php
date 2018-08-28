@extends('layouts.main')

@section('title')
    Admin - Orders
@endsection
@section('content')
<a href="/admin/" class="btn btn-default" role="button">Go back</a>
<h3 align="center">Orders</h3>
<hr>
@if (count($orders)>0)

    @foreach($orders as $order)
    <div class="container">
            <div class="row">
               
                    <div class="col pull-left">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                <li class="list-inline-item">Payment ID: <hr><h4>{{$order->payment_id}}</h4></li>
                                <li class="list-inline-item">Shipping name: <hr><h4>{{$order->name}}</h4></li>
                                <li class="list-inline-item">Shipping address: <hr><h4>{{$order->address}}</h4></li>
                            
                            </ul>
                    </div>
                    <div class="pull-right">
                         <ul class="list-inline">
                             <li class="list-inline-item">
                                 <form action="{{route('admin.deleteorder', $order->id) }}" method="POST">
                                 <input type="hidden" name="_method" value="DELETE">
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                 <button type="submit" class="btn btn-danger">Delete order</button>
                             </form>
                             </li>
                         </ul>
                    </div>
            </div>
            <hr>
         </div> 
    @endforeach
@else
<p>There is no orders at the time.</p>
@endif
   
           
@endsection

