@extends('layouts.main')
@section('title')
    Profile
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>User Profile</h1>
            <br>
            <p>Member since: {{Auth::user()->created_at->toDateString()}}</p>
            <p>Name: {{Auth::user()->name}}</p>
            <p>Email: {{Auth::user()->email}}</p>
            <hr>
            <h2>My Orders</h2>
            @foreach($orders as $order)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($order->cart->items as $item)
                                <li class="list-group-item">
                                    <span class="badge">${{ $item['price'] }}</span>
                                    {{ $item['item']['title'] }} | {{ $item['qty'] }} Units
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <strong>Total Price: ${{ $order->cart->totalPrice }}</strong>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection