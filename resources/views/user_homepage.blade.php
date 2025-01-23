@extends('reg_users_layout.userlayouts')

@section('title', 'Patch Online Bookstore - Your Literary Haven')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section bg-light py-5 mb-5 rounded-lg shadow-sm">
        <div class="container text-center">
            <h1 class="display-4 mb-3">Welcome to Patch Online Bookstore</h1>
            <p class="lead">Discover your next literary adventure with us</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Featured Story Section -->
                <section class="featured-story card border-0 shadow-sm mb-5">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://th.bing.com/th/id/OIP.avm_YDR9qPIhVFuSNCO-BQHaLH?rs=1&pid=ImgDetMain"
                                 class="img-fluid rounded mb-3"
                                 alt="Featured Book"
                                 style="max-height: 400px; object-fit: cover;">
                        </div>
                        <div class="meta-info mb-3">
                            <span class="badge bg-primary">Featured</span>
                            <span class="text-muted ms-2">January 19, 2025</span>
                            <span class="mx-2">&bull;</span>
                            <span class="badge bg-secondary">Fiction</span>
                        </div>
                        <h2 class="card-title">The Adventures of Sherlock Holmes</h2>
                        <p class="lead mb-4">A thrilling series of stories following the famous detective, Sherlock Holmes, and his trusty companion, Dr. Watson, as they solve various mysteries in Victorian London.</p>
                        <p>Dive into the world of deduction, clever twists, and unforgettable characters. Sherlock Holmes is not just a detective; he's a cultural icon.</p>

                    </div>
                </section>

                <!-- Recent Reads Section -->
                <section class="recent-reads mb-5">
                    <h3 class="section-title border-bottom pb-2 mb-4">Recent Reads</h3>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <img src="https://cdn.britannica.com/94/181394-050-2F76F7EE/Reproduction-cover-edition-The-Catcher-in-the.jpg"
                                     class="card-img-top"
                                     style="height: 300px; object-fit: cover;"
                                     alt="The Catcher in the Rye">
                                <div class="card-body">
                                    <h4 class="card-title">The Catcher in the Rye</h4>
                                    <p class="card-text text-muted">A young man's reflections on life, society, and growing up.</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <img src="https://d28hgpri8am2if.cloudfront.net/book_images/onix/cvr9781471173936/the-great-gatsby-9781471173936_hr.jpg"
                                     class="card-img-top"
                                     style="height: 300px; object-fit: cover;"
                                     alt="The Great Gatsby">
                                <div class="card-body">
                                    <h4 class="card-title">The Great Gatsby</h4>
                                    <p class="card-text text-muted">A look at the American Dream in the roaring 1920s.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Author Spotlight Section -->
                <section class="author-spotlight mb-5">
                    <h2 class="section-title border-bottom pb-2 mb-4">Spotlight on Authors</h2>
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h3>J.K. Rowling</h3>
                            <p>The mastermind behind the Harry Potter series, Rowling continues to inspire millions with her magical storytelling.</p>
                            <img src="https://www.kiis1011.com.au/wp-content/uploads/sites/3/2022/08/JK-Rowling-header.jpg?crop=0px,0px,1919px,1080px&resize=2400,1350&quality=75"
                                 class="img-fluid rounded mb-3"
                                 alt="J.K. Rowling">
                        </div>
                    </div>
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h3>George R.R. Martin</h3>
                            <p>The epic tales of Westeros have cemented Martin as a fantasy legend. Explore his works beyond the Game of Thrones series.</p>
                            <img src="https://img.huffingtonpost.com/asset/64beef612600006500fda93a.jpeg?cache=wXsVnos1OD&ops=scalefit_720_noupscale"
                            class="img-fluid rounded mb-3"
                            alt="J.K. Rowling">
                        </div>
                    </div>
                </section>

                <!-- Reading Lists Section -->
                <section class="reading-lists mb-5">
                    <h2 class="section-title border-bottom pb-2 mb-4">Recommended Reading Lists</h2>
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h3>Top 5 Books for 2025</h3>
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">"The Midnight Library"</h5>
                                        <small class="text-muted">Matt Haig</small>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">"Project Hail Mary"</h5>
                                        <small class="text-muted">Andy Weir</small>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">"Klara and the Sun"</h5>
                                        <small class="text-muted">Kazuo Ishiguro</small>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">"A Court of Silver Flames"</h5>
                                        <small class="text-muted">Sarah J. Maas</small>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">"Malibu Rising"</h5>
                                        <small class="text-muted">Taylor Jenkins Reid</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Sidebar -->
             <!-- Modified Sidebar with Scrollable Option -->
             <div class="col-lg-4">
                <!-- Sidebar Container with fixed height -->
                <aside class="sidebar-container">
                    <!-- About Us Card - Always Visible -->
                    <div class="sidebar-static mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h4 class="card-title">About Us</h4>
                                <p class="card-text text-muted">Patch Online Bookstore is your digital companion for exploring books, reviews, and author insights. Join us to find your next favorite read.</p>
                                <a href="\about-us" class="btn btn-primary btn-sm">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <!-- Scrollable Content Container -->
                    <div class="sidebar-scrollable">
                        <!-- Newsletter Signup -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <h4 class="card-title">Stay Updated</h4>
                                <p class="card-text">Subscribe to our newsletter for the latest book reviews and literary news.</p>
                            </div>
                        </div>

                        <!-- Categories -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <h4 class="card-title">Categories</h4>
                                <div class="list-group list-group-flush">
                                    <a href="/categories" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        Fiction
                                        <span class="badge bg-primary rounded-pill"></span>
                                    </a>
                                    <a href="/categories" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        Non-Fiction
                                        <span class="badge bg-primary rounded-pill"></span>
                                    </a>
                                    <a href="/categories" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        Mystery
                                        <span class="badge bg-primary rounded-pill"></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Popular Posts -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <h4 class="card-title">Popular Books</h4>
                                <div class="list-group list-group-flush">
                                    <a href="best_sellers" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">kakarai josu no takagi san</h6>
                                            <small class="text-muted"></small>
                                        </div>
                                    </a>
                                    <a href="best_sellers" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Harry Potter and the Philosopher's Stone</h6>
                                            <small class="text-muted"></small>
                                        </div>
                                    </a>
                                    <a href="best_sellers" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">The Final Horizon</h6>
                                            <small class="text-muted"></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <!-- Add custom CSS -->
    @push('styles')
    <style>
        /* Previous styles remain the same */
        .hero-section {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .section-title {
            position: relative;
            color: #2c3e50;
        }

        .card {
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        /* New sidebar styles */
        .sidebar-container {
            position: sticky;
            top: 2rem;
            height: calc(100vh - 4rem);
            display: flex;
            flex-direction: column;
        }

        .sidebar-static {
            flex-shrink: 0;
        }

        .sidebar-scrollable {
            overflow-y: auto;
            flex-grow: 1;
            /* Customized scrollbar */
            scrollbar-width: thin;
            scrollbar-color: #6c757d #f8f9fa;
        }

        /* Webkit scrollbar styles */
        .sidebar-scrollable::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-scrollable::-webkit-scrollbar-track {
            background: #f8f9fa;
            border-radius: 3px;
        }

        .sidebar-scrollable::-webkit-scrollbar-thumb {
            background-color: #6c757d;
            border-radius: 3px;
        }

        /* Smooth scroll behavior */
        .sidebar-scrollable {
            scroll-behavior: smooth;
        }

        /* Add padding to prevent content from touching scrollbar */
        .sidebar-scrollable {
            padding-right: 10px;
        }

        /* Ensure cards don't stick to the edges */
        .sidebar-scrollable .card {
            margin-right: 5px;
        }

        /* Media query for mobile devices */
        @media (max-width: 991.98px) {
            .sidebar-container {
                position: relative;
                height: auto;
            }

            .sidebar-scrollable {
                max-height: 500px;
            }
        }
    </style>
    @endpush

    <!-- Optional: Add JavaScript for smooth scroll behavior -->
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll to top when clicking on sidebar links
            const sidebarLinks = document.querySelectorAll('.sidebar-scrollable a');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // If the link is meant to scroll within the sidebar
                    if (this.getAttribute('data-scroll-sidebar')) {
                        e.preventDefault();
                        const sidebar = document.querySelector('.sidebar-scrollable');
                        sidebar.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
    @endpush
@endsection
