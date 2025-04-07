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
            <form action="{{route('makeOrder')}}" method="POST">
                @csrf
                <input type="date" name="requiredDate" class="form-control mb-3" value="{{ \Carbon\Carbon::tomorrow()->toDateString() }}">
                <button type="submit" class="btn btn-primary">Make Order</button>
            </form>
        </div>
    @else
        <div class="alert alert-warning text-center mt-5" role="alert">
            <p class="mb-0">Your cart is empty.</p>
        </div>
    @endif
</div>
@endsection