@extends('layouts.main')
<style>
    .card{position:relative;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border:1px solid rgba(0,0,0,.125);border-radius:.25rem}
    </style>

@section('title')
    Homepage
@endsection

@section('content')
<h2 align="center">Latest news</h2>
    <hr class="dark">
    @foreach ($posts as $post)
    
    <div class="col-md-4">
            <div class="card">
                <img style="max-width: 360px" src="{{ asset('images/' . $post->imagePath) }}"/>
                    <h3 align="center" style="padding-top: 10px; padding-bottom: 10px;">{{$post->title}}</h3>
                     <p style="padding-left: 5px; padding-right: 5px;">{{ str_limit(strip_tags($post->body), 250) }}</p>
                     <br>
                     <center>
                     <a style="max-width: 150px" class="btn btn-success" href="/news/{{$post->id}}">Read more</a>
                     </center>
                     <br>
                     
            </div>
            <br>
            <br>
    </div>
  
   
    @endforeach
    <div style="padding-top: 125px" class="row">
            <h2 style="padding-top: 215px" align="center">Latest products</h2>
            <hr class="dark">
            @foreach ($products as $product)
            <div class="col-md-4">
                    <div class="card">
                    <img style="max-width: 360px" src="{{ asset('images/' . $product->imagePath) }}"/>
                    <h3 align="center" style="padding-top: 10px; padding-bottom: 10px;">{{$product->title}}</h3>
                    <p style="padding-left: 5px; padding-right: 5px;">{{ str_limit(strip_tags($product->description), 250) }}</p>
                     <br>
                     <center>
                            <a href="{{ route('product.addToCart', ['id' => $product->id]) }}"
                                    class="btn btn-success" role="button">Add to Cart</a>
                     </center>
                     <br>
                    </div>
            </div>
            @endforeach

    </div>
    
    <div style="margin-top: 50px; background-color:darkseagreen; height:250px;" class="container-fluid">
        <h2 style="color:darkgreen; padding: 20px" align="center">Join our mailing list</h2>
        <p align="center"><i>Enter your email address and receive great new deals and offers!</i>
        </p><br>
        <center>
                <form action="{{ route('admin.store_mail') }}" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group" >
                            
                            <input type="email" name="email" value="" style="width: 300px" class="form-control" placeholder="Enter your email address">
                    </div>
                    <button class="btn btn-outline-secondary" type="submit">Subscribe</button>
                </form>  
                 
                </div>
              </div>
        </center>
        
    </div>
   
@endsection