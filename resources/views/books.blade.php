@extends('components.layouts')

@section('content')
<div class="container mt-5">
    <!-- Search Bar -->
    <div class="row mb-4">
        <div class="col-md-8 mx-auto">
            <form action="{{ route('books.search') }}" method="GET" class="d-flex">
                <input type="text" name="query" class="form-control me-2" placeholder="Search for books, authors, or genres..." value="{{ request()->query('query') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>

    <!-- Add Book Button -->
    <div class="text-end mb-4">
        <a href="{{ route('books.create') }}" class="btn btn-success w-100">
            <i class="fas fa-plus"></i> Add Book
        </a>
    </div>

    <h1 class="text-center mb-4">Books</h1>
    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-3 mb-4">
                <div class="card book-card position-relative">
                    <img src="{{ $book->cover_image }}" class="card-img-top" alt="{{ $book->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">Author: {{ $book->author }}</p>
                        <p class="card-text">Genre: {{ $book->genre }}</p>
                        <p class="card-text">Year: {{ $book->year }}</p>
                    </div>
                    <!-- Delete button -->
                    <button type="button" class="btn btn-danger btn-sm position-absolute bottom-0 end-0 p-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $book->id }}">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>

                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteModal{{ $book->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $book->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $book->id }}">Confirm Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete the book "{{ $book->title }}"? This action cannot be undone.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('books.delete', $book->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

<style>
    .book-card {
        height: 400px; /* Fixed height for the book cards */
        overflow: hidden;
        position: relative;
    }

    .book-card .card-body {
        height: 180px; /* Adjust this to make the body consistent */
        overflow: hidden;
    }

    .book-card img {
        width: 100%;
        height: 200px; /* Make sure the image is fixed */
        object-fit: cover;
    }

    .book-card .btn-danger {
        position: absolute;
        bottom: 10px;
        right: 10px;
    }
</style>
