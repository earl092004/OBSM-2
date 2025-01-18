@extends('reg_users_layout.userlayouts')

@section('title', 'Patch Online Bookstore Blog')

@section('content')
<div class="container my-5">
    <!-- Blog Header -->
    <header class="text-center mb-5">
        <h1 class="display-4 mb-2">Patch Book Stories</h1>
        <p class="lead text-muted">Your Gateway to Literary Adventures</p>
    </header>

    <!-- Dynamic Content Section based on page number -->
    @if($currentPage == 1)
    <div class="row">
        <div class="col-lg-8">
            <!-- Featured Story Review -->
            <article class="mb-5">
                <img src="https://via.placeholder.com/800x400" class="img-fluid rounded mb-3" alt="Featured Book">
                <div class="mb-3">
                    <span class="text-muted">{{ $featuredPost['date'] }}</span>
                    <span class="mx-2">&bull;</span>
                    <span class="text-muted">{{ $featuredPost['category'] }}</span>
                </div>
                <h2 class="mb-3">{{ $featuredPost['title'] }}</h2>
                <p class="lead mb-4">{{ $featuredPost['description'] }}</p>
                <p>Dive into an enchanting world of books, from timeless classics to modern masterpieces. Rediscover why stories are at the heart of human connection.</p>
            </article>

            <!-- Recent Book Reviews -->
            <h3 class="mb-4">Recent Reads</h3>
            <div class="row mb-4">
                @foreach($recentPosts as $post)
                <div class="col-md-6 mb-4">
                    <article>
                        <img src="https://via.placeholder.com/400x250" class="img-fluid rounded mb-3" alt="{{ $post['title'] }}">
                        <h4>{{ $post['title'] }}</h4>
                        <p class="text-muted">{{ $post['description'] }}</p>
                    </article>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="mb-5">
                <h4 class="mb-3">About Us</h4>
                <p class="text-muted">Patch Online Bookstore is your digital companion for exploring books, reviews, and author insights. Join us to find your next favorite read.</p>
            </div>

        </div>
    </div>

    @elseif($currentPage == 2)
    <div class="row">
        <div class="col-lg-8">
            <h2 class="mb-4">Exploring Short Stories</h2>
            <article class="mb-5">
                <h3>"Whispers of the Woods" by Clara Jensen</h3>
                <p>Discover the tale of a young girl who finds solace and adventure in an enchanted forest, unraveling its secrets along the way.</p>
                <h3>"Echoes of the Past" by Daryl Parker</h3>
                <p>A suspenseful journey through time as a historian uncovers a hidden diary that changes everything.</p>
            </article>
        </div>
    </div>

    @elseif($currentPage == 3)
    <div class="row">
        <div class="col-lg-8">
            <h2 class="mb-4">Spotlight on Authors</h2>
            <article class="mb-5">
                <h3>J.K. Rowling</h3>
                <p>The mastermind behind the Harry Potter series, Rowling continues to inspire millions with her magical storytelling.</p>
                <h3>George R.R. Martin</h3>
                <p>The epic tales of Westeros have cemented Martin as a fantasy legend. Explore his works beyond the Game of Thrones series.</p>
            </article>
        </div>
    </div>

    @elseif($currentPage == 4)
    <div class="row">
        <div class="col-lg-8">
            <h2 class="mb-4">Reader's Choice</h2>
            <article class="mb-5">
                <h3>"The Book Thief" by Markus Zusak</h3>
                <p>A gripping tale set in Nazi Germany, exploring the power of words and the resilience of the human spirit.</p>
            </article>
        </div>
    </div>

    @elseif($currentPage == 5)
    <div class="row">
        <div class="col-lg-8">
            <h2 class="mb-4">Recommended Reading Lists</h2>
            <article class="mb-5">
                <h3>Top 5 Books for 2025</h3>
                <ul>
                    <li>"The Midnight Library" by Matt Haig</li>
                    <li>"Project Hail Mary" by Andy Weir</li>
                    <li>"Klara and the Sun" by Kazuo Ishiguro</li>
                    <li>"A Court of Silver Flames" by Sarah J. Maas</li>
                    <li>"Malibu Rising" by Taylor Jenkins Reid</li>
                </ul>
            </article>
        </div>
    </div>
    @endif

    <!-- Pagination -->
    <nav class="my-5">
        <ul class="pagination justify-content-center">
            <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                <a class="page-link" href="{{ route('blog', ['page' => $currentPage - 1]) }}">Previous</a>
            </li>
            @for($i = 1; $i <= 5; $i++)
                <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ route('blog', ['page' => $i]) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item {{ $currentPage == 5 ? 'disabled' : '' }}">
                <a class="page-link" href="{{ route('blog', ['page' => $currentPage + 1]) }}">Next</a>
            </li>
        </ul>
    </nav>
</div>

<style>
body {
    line-height: 1.7;
    color: #2c3e50;
}
.lead {
    font-size: 1.1rem;
    font-weight: 400;
}
article img {
    max-width: 100%;
    height: auto;
}
article h2, article h3 {
    color: #2c3e50;
}
.text-muted {
    color: #6c757d !important;
}
.page-link {
    color: #2c3e50;
}
.page-link:hover {
    color: #1a252f;
}
.page-item.active .page-link {
    background-color: #2c3e50;
    border-color: #2c3e50;
}
</style>
@endsection
