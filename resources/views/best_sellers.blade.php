@extends('reg_users_layout.userlayouts')

@section('title', 'Best Sellers')

@section('content')
<div class="container py-5">
    <!-- Hero Section -->
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-gradient mb-2">Best Sellers</h1>
        <p class="lead text-muted">Discover our most popular and highest-rated books</p>
    </div>

    <!-- Categories Tabs -->
    <div class="tabs-wrapper mb-4">
        <ul class="nav nav-pills gap-2 justify-content-center custom-tabs" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active px-4 py-2" id="topRated-tab" data-bs-toggle="pill" data-bs-target="#topRated" type="button" role="tab">
                    <span class="d-block">Top 20</span>
                    <small class="text-muted">Highest Rated</small>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-4 py-2" id="rated21to40-tab" data-bs-toggle="pill" data-bs-target="#rated21to40" type="button" role="tab">
                    <span class="d-block">21-40</span>
                    <small class="text-muted">Popular Picks</small>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-4 py-2" id="rated41to60-tab" data-bs-toggle="pill" data-bs-target="#rated41to60" type="button" role="tab">
                    <span class="d-block">41-60</span>
                    <small class="text-muted">Rising Stars</small>
                </button>
            </li>
        </ul>
    </div>

    <!-- Tab Content -->
    <div class="tab-content" id="pills-tabContent">
        @foreach(['topRated' => $topRated, 'rated21to40' => $rated21to40, 'rated41to60' => $rated41to60] as $key => $books)
        <div class="tab-pane fade {{ $key === 'topRated' ? 'show active' : '' }}" id="{{ $key }}" role="tabpanel">
            <div class="row g-4">
                @foreach ($books as $book)
                <div class="col-lg-6">
                    <div class="card book-card h-100 border-0 shadow-sm hover-shadow transition-all">
                        <div class="row g-0 h-100">
                            <div class="col-md-4 position-relative">
                                <div class="book-cover-wrapper h-100">
                                    <img src="{{ $book->cover_image }}"
                                         class="img-fluid rounded-start h-100 w-100 object-fit-cover"
                                         alt="{{ $book->title }}">
                                    <div class="rating-badge">
                                        <i class="fas fa-star text-warning"></i>
                                        <span>{{ number_format($book->rating, 1) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body d-flex flex-column h-100">
                                    <div>
                                        <h5 class="card-title mb-1">{{ $book->title }}</h5>
                                        <p class="text-muted mb-2">by <span class="fw-medium">{{ $book->author }}</span></p>
                                        <div class="price-tag mb-3">
                                            <span class="fs-5 fw-bold text-primary">${{ number_format($book->price, 2) }}</span>
                                        </div>
                                    </div>
                                    <div class="mt-auto">
                                        <!-- Add to Cart Button -->
                                        <form action="{{ route('addToCart', $book->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-success w-100">
                                                <i class="fas fa-cart-plus me-2"></i>Add to Cart
                                            </button>
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
        @endforeach
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


<style>
/* Custom Styling */
.text-gradient {
    background: linear-gradient(45deg, #2937f0, #9f1ae2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.custom-tabs .nav-link {
    border-radius: 12px;
    background-color: #f8f9fa;
    border: 1px solid transparent;
    transition: all 0.3s ease;
}

.custom-tabs .nav-link.active {
    background-color: #0d6efd;
    color: white;
}

.custom-tabs .nav-link:not(.active):hover {
    border-color: #dee2e6;
    background-color: white;
}

.book-card {
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.hover-shadow:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}

.book-cover-wrapper {
    position: relative;
    min-height: 250px;
}

.rating-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background: rgba(255, 255, 255, 0.9);
    padding: 5px 10px;
    border-radius: 20px;
    font-weight: 500;
    font-size: 0.9rem;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.transition-all {
    transition: all 0.3s ease;
}

.object-fit-cover {
    object-fit: cover;
}

/* Modal Enhancements */
.modal-content {
    border-radius: 15px;
    overflow: hidden;
}

.book-cover-modal {
    border-radius: 10px;
    overflow: hidden;
}

@media (max-width: 768px) {
    .book-cover-wrapper {
        min-height: 200px;
    }

    .custom-tabs {
        flex-wrap: nowrap;
        overflow-x: auto;
        padding-bottom: 5px;
    }

    .custom-tabs::-webkit-scrollbar {
        height: 4px;
    }

    .custom-tabs::-webkit-scrollbar-thumb {
        background-color: rgba(0,0,0,0.2);
        border-radius: 4px;
    }
}
</style>

@endsection
