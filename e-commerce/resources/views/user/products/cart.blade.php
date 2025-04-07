@extends('user.app.layout')

@section('content')
<div class="container">
    <!-- Display Session Messages -->
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

    @if(session('cart'))
        <div class="cart-items pt-5">
            @foreach($cart as $id => $details)
                <div class="cart-item d-flex justify-content-between align-items-center mb-3 p-3 border">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="img-fluid mr-3" width="100">
                        <div>
                            <h4>{{ $details['name'] }}</h4>
                            <form action="{{ route('updateCart', $id) }}" method="POST" class="d-flex align-items-center pt-2">
                                @csrf
                                <div class="input-group w-auto">
                                    <button type="button" class="btn btn-outline-secondary decrease-qty">-</button>
                                    <input type="number" name="qty" class="form-control text-center quantity-input" value="{{ $details['qty'] }}" min="0" style="width: 60px">
                                    <button type="button" class="btn btn-outline-secondary increase-qty">+</button>
                                </div>
                            </form>
                            <p class="mt-2">Price: ${{ $details['price'] }}</p>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('removeFromCart', $id) }}" class="btn btn-danger btn-sm">Remove</a>
                    </div>
                </div>
                <hr>
            @endforeach
            
            @php
                $totalPrice = array_sum(array_column($cart, 'price'));
            @endphp
            <div class="cart-total text-left mb-4">
                <h3>Total Price: ${{ number_format($totalPrice, 2) }}</h3>
            </div>
        </div>
        
        <div class="d-flex justify-content-between mt-4">
            <div class="order-button">
                <form action="{{ route('makeOrder') }}" method="POST">
                    @csrf
                    <input type="date" name="requiredDate" class="form-control mb-3" value="{{ \Carbon\Carbon::tomorrow()->toDateString() }}">
                    <button type="submit" class="btn btn-primary">Make Order</button>
                </form>
            </div>
            <div>
                <a href="{{ route('clearCart') }}" class="btn btn-danger">Clear Cart</a>
            </div>
        </div>
    @else
        <div class="alert alert-warning text-center mt-5" role="alert">
            <p class="mb-0">Your cart is empty.</p>
        </div>
    @endif
</div>

<style>
    .cart-item {
        background-color: #f8f9fa;
        border-radius: 5px;
    }
    
    .input-group .btn {
        padding: 0.25rem 0.5rem;
    }
    
    .cart-total {
        padding: 15px;
        background-color: #f0f0f0;
        border-radius: 5px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.decrease-qty').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentNode.querySelector('.quantity-input');
                input.stepDown();
                input.dispatchEvent(new Event('change'));
            });
        });

        document.querySelectorAll('.increase-qty').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentNode.querySelector('.quantity-input');
                input.stepUp();
                input.dispatchEvent(new Event('change'));
            });
        });

        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', function() {
                this.form.submit();
            });
        });
    });
</script>
@endsection