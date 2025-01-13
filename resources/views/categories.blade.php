@extends('reg_users_layout.userlayouts')

@section('title', 'Categories')

@section('content')
<div class="container my-5">
    <!-- Page Title -->
    <div class="text-center mb-5">
        <h1 class="display-4">Explore Categories</h1>
        <p class="text-muted">Find books that match your interests</p>
    </div>

    <!-- Categories Grid -->
    <div class="row">
        @foreach (range(1, 8) as $i) <!-- Replace with dynamic categories -->
        <div class="col-md-3 mb-4">
            <div class="category-card position-relative overflow-hidden rounded shadow-sm">
                <div class="category-image" style="background-image: url('https://via.placeholder.com/300x200?text=Category+{{ $i }}');"></div>
                <div class="category-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                    <h4 class="text-white fw-bold">Category {{ $i }}</h4>
                </div>
                <a href="#" class="stretched-link"></a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
