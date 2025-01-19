<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PATCHBookstore')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

<style>

        /* Navbar Styling */
        .navbar {
            padding: 0.5rem 1rem;
            background: linear-gradient(to right, #1a1a1a, #2d2d2d) !important;
        }

        .navbar-brand img {
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.05);
        }

        .nav-link {
            position: relative;
            padding: 0.5rem 1rem;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: #ffc107;
            transition: all 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
            left: 0;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                        url('https://th.bing.com/th/id/OIP.qurh9bjRu0bKFbh9uTRXlwHaEe?w=282&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7') center/cover;
            padding: 6rem 0;
            color: white;
            margin-bottom: 2rem;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        /* User Icon */
        .user-icon {
            background-color: #ffc107;
            padding: 0.4rem 0.7rem;
            border-radius: 50%;
            margin-right: 0.5rem;
            color: #000;
            font-weight: bold;
        }

        /* Cart Button */
        .cart-btn {
            background-color: #ffc107;
            color: #000 !important;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .cart-btn:hover {
            background-color: #ffca2c;
            transform: translateY(-2px);
        }

        /* Footer */
        .footer {
            background: linear-gradient(to right, #1a1a1a, #2d2d2d);
            color: white;
            padding: 2rem 0;
            margin-top: 4rem;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: #ffc107;
        }

        /* Modal Styling */
        .modal-content {
            border-radius: 15px;
            border: none;
        }

        .modal-header {
            background: linear-gradient(to right, #1a1a1a, #2d2d2d);
            color: white;
            border-radius: 15px 15px 0 0;
        }

        .btn-close {
            filter: brightness(0) invert(1);
        }

        .list-group-item {
            border-left: none;
            border-right: none;
            transition: background-color 0.3s ease;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .navbar-brand img {
                width: 50px;
                height: 50px;
            }
        }
    </style>
</head>
<body>


<!-- Notification Container (Positioned fixed at the top of the screen) -->
<div id="notification-container" class="position-fixed top-0 start-50 translate-middle-x p-3 w-50 z-index-100">
    <!-- Success message -->
    @if(session('success'))
        <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <!-- Error message -->
    @if(session('error'))
        <div id="error-message" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif
</div>





    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('user_homepage') }}">
                <img src="{{ asset('img/logo1.png') }}" alt="PATCHBookstore Logo" class="me-2" style="width: 60px; height: 60px; object-fit: contain;">
                <span class="fw-bold">PATCHBookstore</span>
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

                <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <span class="user-icon">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end animate slideIn" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.show') }}">
                                <i class="fas fa-user-circle me-2"></i>Profile
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                    </li>
                    @endauth
                    <!-- Cart Button -->
                        <li class="nav-item ms-2">
                            <a class="cart-btn" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">
                                <i class="fas fa-shopping-cart me-1"></i> Cart

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
            <h1 class="display-4 fw-bold">Discover Your Next Favorite Book</h1>
            <p class="lead">Explore thousands of titles in our collection</p>
            <a href="/user_list_of_books" class="btn btn-warning btn-lg px-4 py-2">
                Browse Books <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </section>
    @endif

    <!-- Main Content -->
    <main class="container my-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="mb-3">About PATCHBookstore</h5>
                    <p class="text-muted">Your one-stop destination for quality books and amazing reads.</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="/about-us">About Us</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="/terms">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="mb-3">Connect With Us</h5>
                    <div class="d-flex gap-3 justify-content-center justify-content-md-start">
                        <a href="#"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2025 PATCHBookstore. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Cart Modal -->
    <div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addToCartModalLabel">Add to Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Book Details Display -->
                    <div id="book-details">
                        <!-- Book info will be injected here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add-to-cart-btn">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Modal -->
    <!-- Cart Modal -->
<!-- Cart Modal -->
<!-- Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-shopping-cart me-2"></i>Your Cart
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                @if(isset($cartItems) && $cartItems->count() > 0)
                    <ul class="list-group list-group-flush">
                        @foreach ($cartItems as $item)
                            <li class="list-group-item" id="cart-item-{{ $item->book->id }}">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">{{ $item->book->title }}</h6>
                                        <p class="text-muted mb-0">Author: {{ $item->book->author }}</p>
                                        <p class="text-primary mb-0">Price: PHP{{ number_format($item->book->price, 2) }}</p>
                                    </div>
                                    <form action="{{ route('removeFromCart', $item->book->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i> Remove
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No items in the cart.</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- Checkout Form -->
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check me-1"></i> Checkout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Function to show success or error message as a popup
       // Function to show success or error message as a popup
function showMessage(type, message) {
    var successMessage = document.getElementById("success-message");
    var errorMessage = document.getElementById("error-message");

    // Show the correct message type
    if (type === "success") {
        successMessage.textContent = message; // Set message
        successMessage.classList.remove("d-none"); // Show the message
        setTimeout(function() {
            successMessage.classList.add("d-none"); // Hide the message after 5 seconds
        }, 5000); // 5 seconds
    } else if (type === "error") {
        errorMessage.textContent = message; // Set message
        errorMessage.classList.remove("d-none"); // Show the message
        setTimeout(function() {
            errorMessage.classList.add("d-none"); // Hide the message after 5 seconds
        }, 5000); // 5 seconds
    }
}

// Check for session messages and show corresponding popup
@if(session('success'))
    showMessage('success', '{{ session('success') }}');
@elseif(session('error'))
    showMessage('error', '{{ session('error') }}');
@endif

    </script>

</body>
</html>
