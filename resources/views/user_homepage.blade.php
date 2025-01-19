@extends('reg_users_layout.userlayouts')

@section('title', 'Browse Books')

@section('content')
<div class="container my-4">
    <!-- Search Bar -->
    <div class="row mb-4">
        <div class="col-md-8 mx-auto">
            <form class="d-flex">
                <input type="text" class="form-control me-2" placeholder="Search for books, authors, or genres..." />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>

    <!-- Featured Books Section -->
    <section class="featured-books mb-5">
        <h2 class="text-center mb-4">Featured Books</h2>
        <div class="row">
            @foreach (range(1, 4) as $i) <!-- Replace with dynamic data later -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Book Title">
                    <div class="card-body">
                        <h5 class="card-title">Book Title {{ $i }}</h5>
                        <p class="card-text text-muted">Author Name</p>
                        <p class="card-text text-success">$10.00</p>
                        <a href="#" class="btn btn-primary btn-sm">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
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

    <!-- Categories Section -->
    <section class="categories mb-5">
        <h2 class="text-center mb-4">Browse by Category</h2>
        <div class="row text-center">
            @foreach (['Fiction', 'Science', 'History'] as $category)
            <div class="col-md-4 mb-3">
                <a href="#" class="text-decoration-none">
                    <div class="category-card position-relative overflow-hidden rounded" style="background-image: url('https://via.placeholder.com/300x200?text={{ $category }}'); background-size: cover; background-position: center; height: 200px;">
                        <div class="category-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0, 0, 0, 0.5);">
                            <h5 class="text-white">{{ $category }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Bestsellers Section -->
    <section class="bestsellers mb-5">
        <h2 class="text-center mb-4">Bestsellers</h2>
        <div class="row">
            @foreach (range(1, 4) as $i) <!-- Replace with dynamic data later -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Book Title">
                    <div class="card-body">
                        <h5 class="card-title">Bestseller {{ $i }}</h5>
                        <p class="card-text text-muted">Author Name</p>
                        <p class="card-text text-success">$15.00</p>
                        <a href="#" class="btn btn-primary btn-sm">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
