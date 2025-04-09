<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <style>
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #f8f9fa; padding: 20px; text-align: center; }
        .item { border-bottom: 1px solid #eee; padding: 10px 0; }
        .total { font-weight: bold; font-size: 18px; padding: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Order Confirmation</h1>
            <p>Thank you for your order!</p>
            <p>Order Date: {{ $orderDate }}</p>
        </div>

        <h2>Order Details</h2>
        @foreach($cart as $id => $details)
            <div class="item">
                <p><strong>{{ $details['name'] }}</strong></p>
                <p>Quantity: {{ $details['qty'] }}</p>
                <p>Price: ${{ number_format($details['price'], 2) }}</p>
            </div>
        @endforeach

        <div class="total">
            Total Price: ${{ number_format($totalPrice, 2) }}
        </div>

        <p>If you have any questions, please contact us at support@yourdomain.com</p>
    </div>
</body>
</html>