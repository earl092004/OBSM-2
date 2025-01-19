@extends('reg_users_layout.userlayouts')

@section('title', 'Categories')

@section('content')
<div class="container my-5">
    <!-- Page Title -->
    <div class="text-center mb-5">
        <h1 class="display-4">Explore Genres</h1>
        <p class="text-muted">Find books that match your interests</p>
    </div>

    <!-- Categories Grid -->
    <div class="row">
        @php
            // Create a genre to image mapping
            $genreImages = [
                'Action' => 'https://images.actionnetwork.com/blog/2020/01/action-logo.png',
                'Drama' => 'https://logodix.com/logo/2090905.png',
                'Non-fiction' => 'https://booklife.co.uk/cdn/shop/files/1368.png?v=1710244303&width=907',
                'Comedy' => 'https://www.pikpng.com/pngl/b/248-2485900_comedy-logo-clipart.png',
                'Thriller' => 'https://logodix.com/logo/1621654.png',
                'Fantasy' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Disney_Fantasy_logo.svg/1280px-Disney_Fantasy_logo.svg.png',
                'Romance' => 'https://www.nicepng.com/png/full/171-1719202_pure-romance-logo-png.png',
                'Sci-fi' => 'https://logos-world.net/wp-content/uploads/2023/04/Sci-Fi-Channel-Logo-1992.png'
            ];
        @endphp
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

        @foreach (['Action', 'Drama', 'Non-fiction', 'Comedy', 'Thriller', 'Fantasy', 'Romance', 'Sci-fi'] as $genre)
        <div class="col-md-3 mb-4">
            <div class="category-card position-relative overflow-hidden rounded shadow-sm">
                <!-- Use the genre to pick the right image -->
                <div class="category-image" style="background-image: url('{{ $genreImages[$genre] }}');"></div>
                <div class="category-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                    <h4 class="text-white fw-bold">{{ $genre }}</h4>
                </div>
                <a href="{{ route('books.genre', $genre) }}" class="stretched-link"></a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
