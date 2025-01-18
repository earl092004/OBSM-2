<h1>Thank You for Your Purchase, {{ $transaction->user->name }}!</h1>
<p>We are processing your order of the following books:</p>

@foreach(json_decode($transaction->books, true) as $book)
    <p>{{ $book['title'] }} ({{ $book['quantity'] }} x ${{ $book['price'] }})</p>
@endforeach

<p>Total: ${{ $transaction->total_amount }}</p>

<p>Your order will be shipped soon!</p>
