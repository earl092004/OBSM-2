<!-- resources/views/userTransactions.blade.php -->

@extends('components.layouts')

@section('content')
<div class="container">
    <h2>Transactions</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Book ID</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->user_id }}</td>
                <td>{{ $transaction->book_id }}</td>
                <td>₱{{ number_format($transaction->price, 2) }}</td>
                <td>{{ $transaction->quantity }}</td>
                <td>₱{{ number_format($transaction->total_amount, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Button to download transactions as CSV -->
    <a href="{{ route('transactions.downloadCSV') }}" class="btn btn-success">Download CSV</a>
</div>
@endsection
