@extends('user.app.layout')

@section('content')

<div class="container w-70">
    <div class="col-md-4">
        <div class="product-item">
            <a href=""><img src="{{asset("storage/$product->image")}}" alt=""></a>
            <div class="down-content">
            <a href="#"><h4>{{$product->name}}</h4></a>
            <h6>${{$product->price}}</h6>
            <p>{{$product->desc}}</p>
            <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
            </ul>
            <span>{{$product->quantity}}</span>
            <form action="{{route("addToCart", $product->id)}}" method="POST">
                @csrf
                <input type="number" name="qty" id="">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection