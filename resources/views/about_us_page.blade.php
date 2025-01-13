@extends('reg_users_layout.userlayouts')

@section('title', 'About Us')

@section('content')
<div class="container my-5">
    <!-- Hero Section -->
    <div class="text-center mb-5 py-5" style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364); color: white; border-radius: 10px;">
        <h1 class="display-3 fw-bold">About Us</h1>
        <p class="lead">Unleashing the power of stories, one book at a time.</p>
    </div>

    <!-- Who We Are Section -->
    <section class="mb-5">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="https://scontent.fcrk2-3.fna.fbcdn.net/v/t1.15752-9/462581569_2460914847574935_3880906068400133784_n.png?_nc_cat=107&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeHUJwT4CMFOtYjHpjbW7dNjOUTFEEnWEWY5RMUQSdYRZrteBvGt361mYuIUOYXTf-CZhAR5DEPD_d6GZVOP4l1-&_nc_ohc=wtejkYDnHG8Q7kNvgGzcnRh&_nc_zt=23&_nc_ht=scontent.fcrk2-3.fna&oh=03_Q7cD1gHy0UCph7qWasYbv9Z5M0f4xIzny6lmfBfcHbZ6eTPyuQ&oe=67A6FD1E" class="img-fluid rounded" alt="Our Mission">
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold">Who We Are</h2>
                <p class="text-muted">
                    We are a passionate team of book lovers dedicated to connecting readers with stories that inspire, educate, and entertain. From timeless classics to modern masterpieces, we provide a curated collection of books for every taste.
                </p>
                <p class="text-muted">
                    Our mission is to create a community where readers can discover, explore, and share the joy of reading.
                </p>
            </div>
        </div>
    </section>

    <!-- Our Vision and Mission -->
    <section class="mb-5">
        <div class="row text-center">
            <div class="col-md-6">
                <div class="p-4 shadow rounded">
                    <h3 class="fw-bold text-primary">Our Vision</h3>
                    <p class="text-muted">To be the world's leading online bookstore, inspiring readers everywhere.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 shadow rounded">
                    <h3 class="fw-bold text-primary">Our Mission</h3>
                    <p class="text-muted">To make books accessible, affordable, and available to everyone, everywhere.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Team -->
    <section class="mb-5">
        <h2 class="text-center fw-bold mb-4">Meet Our Team</h2>
        <div class="row text-center">
            <!-- Leader (John Smith) -->
            <div class="col-md-12 mb-5">
                <div class="card h-100 shadow-lg position-relative" style="z-index: 10; transform: translateY(-30px); border: 2px solid #203a43;">
                    <img src="https://scontent.fcrk2-2.fna.fbcdn.net/v/t39.30808-6/343626527_1443909619758974_3079658517621038443_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeFKfEqRKqriE3JFO53czAKhyBoHyANyqFPIGgfIA3KoU-FfgYgLrOb32y61cwyFbX-NaZsxGiJ6P4BvteJo9M49&_nc_ohc=ZRao2O3U6fIQ7kNvgHXP0DY&_nc_zt=23&_nc_ht=scontent.fcrk2-2.fna&_nc_gid=AQUFVpaUrSGJGVmQAo_M7Mj&oh=00_AYBWPf-2ufazSLnOIlEcD4aHx1A6M0RsBl8CD6wpJeLoZg&oe=67854C07" class="card-img-top rounded-circle mx-auto mt-3" alt="Team Leader" style="width: 180px; height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h4 class="card-title text-primary fw-bold">Earl Sean Lawrence A. Pacho</h4>
                        <p class="card-text text-muted">Chief Operating Officer</p>
                        <p class="card-text">"Leading with vision and passion to build a better tomorrow."</p>
                    </div>
                </div>
            </div>

            <!-- Other Team Members -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">
                    <img src="https://static.vecteezy.com/system/resources/previews/021/059/827/non_2x/chatgpt-logo-chat-gpt-icon-on-white-background-free-vector.jpg" class="card-img-top rounded-circle mx-auto mt-3" alt="Team Member" style="width: 150px; height: 150px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Everyones BestFriend</h5>
                        <p class="card-text text-muted">Coderist</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">
                    <img src="https://scontent.fcrk4-1.fna.fbcdn.net/v/t39.30808-1/465544643_1574253673972713_3540731399167191482_n.jpg?stp=dst-jpg_s200x200_tt6&_nc_cat=106&ccb=1-7&_nc_sid=e99d92&_nc_eui2=AeHJZqHnPAFkhZ5LfTf9UjZ8VsnAMkPz3OBWycAyQ_Pc4AuF59mxuFU8C480gxITbaRDrYH4GA_OPGM-hSerVO0n&_nc_ohc=mmP4nvD2uTwQ7kNvgEC3I96&_nc_zt=24&_nc_ht=scontent.fcrk4-1.fna&_nc_gid=A7G17MjkZnOdNwrRsVQMHyf&oh=00_AYBVdzbug2zxkkCFUzlRRahPen5LjGPIaXomTbNvOtgDEQ&oe=678553E3" class="card-img-top rounded-circle mx-auto mt-3" alt="Team Member" style="width: 150px; height: 150px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Nyah Ostonal</h5>
                        <p class="card-text text-muted">Creative Director</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">
                    <img src="https://scontent.fmnl4-1.fna.fbcdn.net/v/t1.15752-9/472766591_3995151504036294_8149527529833759338_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeEWJIA86BVH6V1LgxP39ptP-qlylW6Y65j6qXKVbpjrmCNCZZBl2ziVjcjw4r1yv2QFCxt8UjpAIFt-REmuy28J&_nc_ohc=VudP8bTpd64Q7kNvgGfmJT2&_nc_zt=23&_nc_ht=scontent.fmnl4-1.fna&oh=03_Q7cD1gFSM1PtfM4UVgIuzQ4ytU-3j06ocK9apO5u3Y5aw4LBgw&oe=67A70BF0" class="card-img-top rounded-circle mx-auto mt-3" alt="Team Member" style="width: 150px; height: 150px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Xevi Olivas</h5>
                        <p class="card-text text-muted">Creative Director</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <div class="text-center py-5" style="background: linear-gradient(to right, #2c5364, #203a43, #0f2027); color: white; border-radius: 10px;">
        <h2 class="fw-bold">Join Us on Our Journey</h2>
        <p class="lead">Discover the joy of reading with us. Together, we can build a world where stories connect us all.</p>
        <a href="/books" class="btn btn-light btn-lg fw-bold">Browse Books</a>
    </div>
</div>
@endsection
