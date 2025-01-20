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
                <center><img src="https://th.bing.com/th/id/OIP.avm_YDR9qPIhVFuSNCO-BQHaLH?rs=1&pid=ImgDetMain" style="width: 200px" height="100px"  class="img-fluid rounded mb-3" alt="Featured Book"></center>
                <div class="mb-3">
                    <span class="text-muted">January 19, 2025</span>
                    <span class="mx-2">&bull;</span>
                    <span class="text-muted">Fiction</span>
                </div>
                <h2 class="mb-3">The Adventures of Sherlock Holmes</h2>
                <p class="lead mb-4">A thrilling series of stories following the famous detective, Sherlock Holmes, and his trusty companion, Dr. Watson, as they solve various mysteries in Victorian London.</p>
                <p>Dive into the world of deduction, clever twists, and unforgettable characters. Sherlock Holmes is not just a detective; he’s a cultural icon.</p>
            </article>

            <!-- Recent Book Reviews -->
            <h3 class="mb-4">Recent Reads</h3>
            <div class="row mb-4">
                <div class="col-md-6 mb-4">
                    <article>
                        <img src="https://cdn.britannica.com/94/181394-050-2F76F7EE/Reproduction-cover-edition-The-Catcher-in-the.jpg" width="180" class="img-fluid rounded mb-3" alt="Featured Book">
                        <h4>The Catcher in the Rye</h4>
                        <p class="text-muted">A young man's reflections on life, society, and growing up.</p>
                    </article>
                </div>
                <div class="col-md-6 mb-4">
                    <article>
                        <img src="https://d28hgpri8am2if.cloudfront.net/book_images/onix/cvr9781471173936/the-great-gatsby-9781471173936_hr.jpg" width="170" class="img-fluid rounded mb-3" alt="Featured Book">
                        <h4>The Great Gatsby</h4>
                        <p class="text-muted">A look at the American Dream in the roaring 1920s.</p>
                    </article>
                </div>
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
            <h2 class="mb-4">Exploring Short Stories</h2><br>

       <img src="https://cdna.artstation.com/p/assets/images/images/060/659/660/large/untai-studio-cover-book-final-resize.jpg?1679031781" style="width: 200px" height="100px"  class="img-fluid rounded mb-3" alt="Featured Book">
            <article class="mb-5">
                <h3>"Whispers of the Woods" by Clara Jensen</h3>
                <p>Deep within the heart of an ancient forest, where sunlight filtered through a canopy of emerald leaves and the air was thick with the scent of moss and earth, there existed a hidden glade untouched by time. It was said that within this sacred grove, whispers danced among the trees, carrying tales of forgotten magic and untold secrets.</p>
                <br>
                <img src="https://m.media-amazon.com/images/M/MV5BNzJiYWQ2OTctOWU2MS00ODk1LWJhOWMtZWUzYmI5YTUzNDk2XkEyXkFqcGdeQXVyOTkwMTE1Mzk@._V1_UY1200_CR115,0,630,1200_AL_.jpg" style="width: 200px" height="100px"  class="img-fluid rounded mb-3" alt="Featured Book">
                <h3>"Echoes of the Past" by Daryl Parker</h3>
                <p>Memories are the  threads  that weave  the  fabric of our  identities,  connecting  our  past  to  our present and shaping our future. They are integral to our sense of self, enabling us to learn, adapt, and  thrive in an ever-changing  world.</p>
            </article>
        </div>
    </div>

    @elseif($currentPage == 3)
    <div class="row">
        <div class="col-lg-8">
            <h2 class="mb-4">Spotlight on Authors</h2>
            <article class="mb-5">
                <img src="https://www.kiis1011.com.au/wp-content/uploads/sites/3/2022/08/JK-Rowling-header.jpg?crop=0px,0px,1919px,1080px&resize=2400,1350&quality=75" style="width: 700px" height="100px"  class="img-fluid rounded mb-3" alt="Featured Book">
                <h3>J.K. Rowling</h3>
                <p>The mastermind behind the Harry Potter series, Rowling continues to inspire millions with her magical storytelling.</p>
                <br>
                <img src="https://media1.popsugar-assets.com/files/thumbor/574igOiJbaWU6Gv9mb4tBqT7VUI/fit-in/2048xorig/filters:format_auto-!!-:strip_icc-!!-/2019/05/21/634/n/1922283/tmp_2CvDSv_6743f3c69288fcc0_GettyImages-1134765970.jpg" style="width: 700px" height="100px"  class="img-fluid rounded mb-3" alt="Featured Book">
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
                <img src="https://www.penguinrandomhouse.co.za/sites/penguinbooks.co.za/files/cover/The%20Book%20Thief%209781784162122.jpg" style="width: 200px" height="100px"  class="img-fluid rounded mb-3" alt="Featured Book">
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
