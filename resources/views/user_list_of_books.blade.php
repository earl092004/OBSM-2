@extends('reg_users_layout.userlayouts')

@section('title', 'List of Books')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center mb-4">
        <div class="col-12">
            <h1 class="text-center h3 mb-2">Explore Our Books</h1>
            <p class="text-center text-muted small">Discover your next favorite book from our curated collection</p>
        </div>
    </div>

    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3">
        @foreach ($books as $book)
    <div class="col">
        <div class="card h-100 border-0 shadow-sm">
            <img src="{{ $book->cover_image }}" class="card-img-top" alt="{{ $book->title }}" style="height: 200px; object-fit: cover;">
            <div class="card-body p-2">
                <h6 class="card-title mb-1 text-truncate">{{ $book->title }}</h6>
                <p class="card-text text-muted small mb-1">{{ $book->author }}</p>
                <p class="card-text fw-bold mb-2" style="font-size: 0.9rem;">PHP{{ number_format($book->price, 2) }}</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookModal{{ $book->id }}">
                    Add to Cart
                </button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="bookModal{{ $book->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light py-3">
                        <h5 class="modal-title fs-5">{{ $book->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ $book->cover_image }}" class="img-fluid rounded shadow-sm mb-3" alt="{{ $book->title }}" style="width: 100%; object-fit: cover;">
                                <div class="d-grid gap-2">
                                    <form action="{{ route('addToCart', $book->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                                    </form>

                                    <p class="text-center fw-bold fs-5 mt-2 mb-0">PHP{{ number_format($book->price, 2) }}</p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h4 class="mb-3">{{ $book->title }}</h4>
                                <div class="mb-4">
                                    <p class="mb-2"><strong>Author:</strong> {{ $book->author }}</p>
                                    <p class="mb-2"><strong>Genre:</strong> {{ $book->genre }}</p>
                                    <p class="mb-2"><strong>Year:</strong> {{ $book->year }}</p>
                                </div>
                                <h5 class="mb-3">Description</h5>
                                <p class="text-muted">{{ $book->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

@endforeach
    </div>
</div>
@endsection
