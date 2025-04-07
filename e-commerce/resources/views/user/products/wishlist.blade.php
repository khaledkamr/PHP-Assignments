@extends('user.app.layout')

@section('content')
<div class="container">
    @if(session('wishlist'))
        <div class="cart-items pt-5">
            @foreach($wishlist as $id => $details)
                <div class="cart-item d-flex justify-content-between">
                    <div>
                        <h4>{{ $details['name'] }}</h4>
                        <p>Price: ${{ $details['price'] }}</p>
                        @auth
                            <form action="{{route("addToCart", $id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="qty" id="" value="1">
                                <button type="submit" class="btn btn-primary mt-2">Add to Cart</button>
                            </form>
                        @endauth
                    </div>
                    <div>
                        <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="img-fluid" width="100">
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
        
    @else
        <div class="alert alert-warning text-center mt-5" role="alert">
            <p class="mb-0">Your wishlist is empty.</p>
        </div>
    @endif
</div>
@endsection