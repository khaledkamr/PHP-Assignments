@extends('user.app.layout')

@section('content')
<div class="container">
    @if(session('cart'))
        <div class="cart-items pt-5">
            @foreach($cart as $id => $details)
                <div class="cart-item d-flex justify-content-between">
                    <div>
                        <h4>{{ $details['name'] }}</h4>
                        <p>Quantity: {{ $details['qty'] }}</p>
                        <p>Price: ${{ $details['price'] }}</p>
                    </div>
                    <div>
                        <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="img-fluid" width="100">
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
        <div class="order-button">
            <form action="{{}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Make Order</button>
            </form>
        </div>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection