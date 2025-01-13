<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PATCHBookstore')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>



    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('user_homepage') }}">
                <img src="{{ asset('img/logo1.png') }}" alt="PATCHBookstore Logo" class="me-2" style="width: 60px; height: 60px; object-fit: contain;">
                PATCHBookstore
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('user_homepage') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/user_list_of_books">Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="/categories">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="/best-sellers">Best Sellers</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about-us">About Us</a></li>
                </ul>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning text-dark ms-2" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">
                        <i class="fas fa-shopping-cart"></i> Cart
                        </a>
                        </li>

                <ul class="navbar-nav ms-auto">
                                        <!-- Cart Button -->


                    @auth
                        <!-- If the user is logged in -->
                        <ul class="navbar-nav ms-auto">
                            @auth
    <!-- If the user is logged in -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="user-icon">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span> {{ auth()->user()->name }}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <!-- Logout button inside a form -->
            <li>
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </li>
        </ul>
    </li>
@endauth
                        </ul>
                        </li>
                    @else
                        <!-- If the user is not logged in -->
                        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link cart-btn ms-2" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">
                            <i class="fas fa-shopping-cart"></i> Cart
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    @if(Route::currentRouteName() === 'user_homepage')
    <section class="hero">
        <div class="container text-center">
            <h1>Discover Your Next Favorite Book</h1>
            <p>Explore thousands of titles.</p>
            <a href="/user_list_of_books" class="btn btn-primary btn-lg">Browse Books</a>
        </div>
    </section>
    @endif

    <!-- Main Content -->
    <main class="container my-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer py-4">
        <div class="container text-center">
            <p>&copy; 2025 PATCHBookstore. All rights reserved.</p>
            <div class="d-flex justify-content-center">
                <a href="#" class="text-white mx-2"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white mx-2"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Your Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Hardcoded Cart Items -->
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Book Title 1</strong><br>
                                    <span>Author: Author Name</span><br>
                                    <span>Price: $10.99</span>
                                </div>
                                <div>
                                    <button class="btn btn-danger btn-sm">Remove</button>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Book Title 2</strong><br>
                                    <span>Author: Author Name</span><br>
                                    <span>Price: $12.99</span>
                                </div>
                                <div>
                                    <button class="btn btn-danger btn-sm">Remove</button>
                                </div>
                            </div>
                        </li>
                        <!-- Add more hardcoded items here -->
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Checkout</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
