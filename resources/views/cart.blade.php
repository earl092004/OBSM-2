@extends('reg_users_layout.userlayouts')

@section('title', 'Your Cart')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Your Cart</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Book Title</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach(session('cart') as $bookId => $details)
                <tr>
                    <td>{{ $details['title'] }}</td>
                    <td>${{ number_format($details['price'], 2) }}</td>
                    <td>{{ $details['quantity'] }}</td>
                    <td>${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
    </div>
</div>

<!-- Modal after Checkout -->
@@if(session('cart'))
<div class="cart-items">
    @foreach(session('cart') as $item)
        <div class="cart-item">
            <h5>{{ $item['title'] }}</h5>
            <p>Price: PHP {{ number_format($item['price'], 2) }}</p>
            <p>Quantity: {{ $item['quantity'] }}</p>
        </div>
    @endforeach
</div>
@else
<p>Your cart is empty.</p>
@endif

@endif

@endsection
