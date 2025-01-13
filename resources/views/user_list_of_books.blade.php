@extends('reg_users_layout.userlayouts')

@section('title', 'List of Books')

@section('content')
<div class="container my-5">
    <!-- Page Title -->
    <div class="text-center mb-4">
        <h1 class="display-4">Explore Our Books</h1>
        <p class="text-muted">Discover your next favorite book from our curated collection</p>
    </div>

    <!-- Books Grid -->
    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $book->cover_image }}" class="card-img-top" alt="{{ $book->title }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text text-muted">By: {{ $book->author }}</p>
                        <p class="card-text">Genre:{{ $book->genre }}</p>
                        <p class="card-text">Year: {{ $book->year }}</p>
                        <!-- View Details Button -->
                        <button class="btn btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="#bookModal{{ $book->id }}">View Details</button>
                    </div>
                </div>
            </div>

            <!-- Modal for Book Details -->
            <div class="modal fade" id="bookModal{{ $book->id }}" tabindex="-1" aria-labelledby="bookModalLabel{{ $book->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bookModalLabel{{ $book->id }}">{{ $book->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ $book->cover_image }}" class="img-fluid rounded" alt="{{ $book->title }}">
                                </div>
                                <div class="col-md-8">
                                    <p class="text-muted">By: {{ $book->author }}</p>
                                    <p class="text-success fw-bold">Genre: {{ $book->genre }}</p>
                                    <p class="text-success fw-bold">Year: {{ $book->year }}</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas odio.</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
