@extends('reg_users_layout.userlayouts')

@section('title', 'Best Sellers')

@section('content')
<div class="container my-5">
    <!-- Page Title -->
    <div class="text-center mb-4">
        <h1 class="display-4">Best Sellers</h1>
        <p class="text-muted">Explore the top books in different categories</p>
    </div>

    <!-- Categories Tabs -->
    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="worldwide-tab" data-bs-toggle="pill" data-bs-target="#worldwide" type="button" role="tab" aria-controls="worldwide" aria-selected="true">Top 10 Rated</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="philippines-tab" data-bs-toggle="pill" data-bs-target="#philippines" type="button" role="tab" aria-controls="philippines" aria-selected="false">Top 11-20 Rated</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="spup-tab" data-bs-toggle="pill" data-bs-target="#spup" type="button" role="tab" aria-controls="spup" aria-selected="false">Top 21-50 Rated</button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="pills-tabContent">
        <!-- Top 10 Worldwide -->
        <div class="tab-pane fade show active" id="worldwide" role="tabpanel" aria-labelledby="worldwide-tab">
            <div class="row">
                @foreach (range(1, 10) as $i) <!-- Replace with dynamic data -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://via.placeholder.com/150" class="img-fluid rounded-start" alt="Book Cover">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Book Title {{ $i }}</h5>
                                    <p class="card-text text-muted">by Author {{ $i }}</p>
                                    <p class="card-text text-success fw-bold">$12.99</p>
                                    <a href="#" class="btn btn-primary btn-sm">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Top 10 in the Philippines -->
        <div class="tab-pane fade" id="philippines" role="tabpanel" aria-labelledby="philippines-tab">
            <div class="row">
                @foreach (range(1, 10) as $i) <!-- Replace with dynamic data -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://via.placeholder.com/150" class="img-fluid rounded-start" alt="Book Cover">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Philippine Book Title {{ $i }}</h5>
                                    <p class="card-text text-muted">by Author {{ $i }}</p>
                                    <p class="card-text text-success fw-bold">$14.99</p>
                                    <a href="#" class="btn btn-primary btn-sm">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Top 10 in SPUP -->
        <div class="tab-pane fade" id="spup" role="tabpanel" aria-labelledby="spup-tab">
            <div class="row">
                @foreach (range(1, 10) as $i) <!-- Replace with dynamic data -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://via.placeholder.com/150" class="img-fluid rounded-start" alt="Book Cover">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">SPUP Book Title {{ $i }}</h5>
                                    <p class="card-text text-muted">by Author {{ $i }}</p>
                                    <p class="card-text text-success fw-bold">$9.99</p>
                                    <a href="#" class="btn btn-primary btn-sm">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
