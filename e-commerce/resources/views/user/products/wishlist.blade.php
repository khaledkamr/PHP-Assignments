@extends('user.app.layout')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger mt-3" role="alert">
            {{ session('error') }}
        </div>
    @endif

    @if(session('wishlist'))
        <div class="cart-items pt-5">
            @foreach($wishlist as $id => $details)
                <div class="cart-item d-flex justify-content-between align-items-center mb-3 p-3 border">
                    <div>
                        <h4>{{ $details['name'] }}</h4>
                        <p>Price: ${{ $details['price'] }}</p>
                        @auth
                            <form action="{{route('addToCart', $id)}}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="qty" value="1">
                                <button type="submit" class="btn btn-primary mt-2">Add to Cart</button>
                            </form>
                            <a href="{{route('removeFromWishlist', $id)}}" class="btn btn-danger mt-2 ml-2">Remove</a>
                        @endauth
                    </div>
                    <div>
                        <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="img-fluid" width="100">
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
        
        <div class="text-right mt-4">
            <a href="{{route('clearWishlist')}}" class="btn btn-danger">Clear Wishlist</a>
        </div>
    @else
        <div class="alert alert-warning text-center mt-5" role="alert">
            Your wishlist is empty
        </div>
    @endif
</div>

<style>
    .cart-item {
        background-color: #f8f9fa;
        border-radius: 5px;
    }
</style>
@endsection