@extends('reg_users_layout.userlayouts')

@section('title', 'About Us')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Modern Design</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c5364;
            --secondary-color: #203a43;
            --accent-color: #0f2027;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 120px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('/api/placeholder/1920/1080') center/cover;
            opacity: 0.1;
        }

        .gradient-text {
            background: linear-gradient(45deg, #4CA1AF, #2C3E50);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .team-card {
            transition: transform 0.3s ease-in-out;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .mission-vision-card {
            background: white;
            border-radius: 20px;
            transition: all 0.3s ease;
            height: 100%;
        }

        .mission-vision-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .cta-section {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            border-radius: 20px;
            padding: 60px 20px;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255,255,255,0.1) 25%, transparent 25%) -20px 0,
                        linear-gradient(-45deg, rgba(255,255,255,0.1) 25%, transparent 25%) -20px 0;
            background-size: 40px 40px;
        }

        .profile-img {
            border: 4px solid white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .leader-card {
            background: linear-gradient(135deg, #ffffff, #f8f9fa);
            border: none;
            border-radius: 20px;
        }

        .btn-custom {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            color: white;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <!-- Hero Section -->
    <div class="hero-section text-center text-white position-relative">
        <div class="container" data-aos="fade-up">
            <h1 class="display-2 fw-bold mb-4">About Us</h1>
            <p class="lead fs-3">Unleashing the power of stories, one book at a time.</p>
        </div>
    </div>

    <div class="container my-5">
        <!-- Who We Are Section -->
        <section class="py-5" data-aos="fade-up">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <img src="https://scontent.fcrk2-3.fna.fbcdn.net/v/t1.15752-9/462581569_2460914847574935_3880906068400133784_n.png?_nc_cat=107&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeHUJwT4CMFOtYjHpjbW7dNjOUTFEEnWEWY5RMUQSdYRZrteBvGt361mYuIUOYXTf-CZhAR5DEPD_d6GZVOP4l1-&_nc_ohc=wtejkYDnHG8Q7kNvgGzcnRh&_nc_zt=23&_nc_ht=scontent.fcrk2-3.fna&oh=03_Q7cD1gHy0UCph7qWasYbv9Z5M0f4xIzny6lmfBfcHbZ6eTPyuQ&oe=67A6FD1E" class="img-fluid rounded" alt="Our Mission">
                </div>
                <div class="col-md-7 ps-md-5">
                    <h2 class="display-4 fw-bold gradient-text mb-4">Who We Are</h2>
                    <p class="lead text-muted">
                        We are a passionate team of book lovers dedicated to connecting readers with stories that inspire, educate, and entertain. From timeless classics to modern masterpieces, we provide a curated collection of books for every taste.
                    </p>
                    <p class="lead text-muted">
                        Our mission is to create a community where readers can discover, explore, and share the joy of reading.
                    </p>
                </div>
            </div>
        </section>

        <!-- Vision & Mission -->
        <section class="py-5" data-aos="fade-up">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mission-vision-card p-5">
                        <h3 class="display-6 fw-bold gradient-text mb-4">Our Vision</h3>
                        <p class="lead text-muted">To be the world's leading online bookstore, inspiring readers everywhere.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mission-vision-card p-5">
                        <h3 class="display-6 fw-bold gradient-text mb-4">Our Mission</h3>
                        <p class="lead text-muted">To make books accessible, affordable, and available to everyone, everywhere.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="py-5" data-aos="fade-up">
            <h2 class="display-4 fw-bold text-center gradient-text mb-5">Meet Our Team</h2>

            <!-- Leader Card -->
            <div class="leader-card p-4 mb-5 shadow-lg" data-aos="zoom-in">
                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        <img src="https://scontent.fcrk2-2.fna.fbcdn.net/v/t39.30808-6/343626527_1443909619758974_3079658517621038443_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeFKfEqRKqriE3JFO53czAKhyBoHyANyqFPIGgfIA3KoU-FfgYgLrOb32y61cwyFbX-NaZsxGiJ6P4BvteJo9M49&_nc_ohc=ZRao2O3U6fIQ7kNvgHXP0DY&_nc_zt=23&_nc_ht=scontent.fcrk2-2.fna&_nc_gid=AQUFVpaUrSGJGVmQAo_M7Mj&oh=00_AYBWPf-2ufazSLnOIlEcD4aHx1A6M0RsBl8CD6wpJeLoZg&oe=67854C07" class="card-img-top rounded-circle mx-auto mt-3" alt="Team Leader" style="width: 180px; height: 180px; object-fit: cover;">
                    </div>
                    <div class="col-md-8">
                        <h3 class="gradient-text fw-bold mb-3">Earl Sean Lawrence A. Pacho</h3>
                        <h5 class="text-muted mb-3">Chief Operating Officer</h5>
                        <p class="lead">"Leading with vision and passion to build a better tomorrow."</p>
                    </div>
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

            <!-- Team Members -->
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-card shadow">
                        <center><img src="https://static.vecteezy.com/system/resources/previews/021/059/827/non_2x/chatgpt-logo-chat-gpt-icon-on-white-background-free-vector.jpg" class="card-img-top rounded-circle mx-auto mt-3" alt="Team Member" style="width: 150px; height: 150px; object-fit: cover;"></center>
                        <div class="card-body text-center p-4">
                            <h4 class="gradient-text fw-bold">Everyones BestFriend</h4>
                            <p class="text-muted">Coderist</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-card shadow">
                        <center> <img src="https://scontent.fcrk4-1.fna.fbcdn.net/v/t39.30808-1/465544643_1574253673972713_3540731399167191482_n.jpg?stp=dst-jpg_s200x200_tt6&_nc_cat=106&ccb=1-7&_nc_sid=e99d92&_nc_eui2=AeHJZqHnPAFkhZ5LfTf9UjZ8VsnAMkPz3OBWycAyQ_Pc4AuF59mxuFU8C480gxITbaRDrYH4GA_OPGM-hSerVO0n&_nc_ohc=mmP4nvD2uTwQ7kNvgEC3I96&_nc_zt=24&_nc_ht=scontent.fcrk4-1.fna&_nc_gid=A7G17MjkZnOdNwrRsVQMHyf&oh=00_AYBVdzbug2zxkkCFUzlRRahPen5LjGPIaXomTbNvOtgDEQ&oe=678553E3" class="card-img-top rounded-circle mx-auto mt-3" alt="Team Member" style="width: 150px; height: 150px; object-fit: cover;"></center>
                        <div class="card-body text-center p-4">
                            <h4 class="gradient-text fw-bold">Nyah Ostonal</h4>
                            <p class="text-muted">Creative Director</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-card shadow">
                        <center><img src="https://scontent.fmnl4-1.fna.fbcdn.net/v/t1.15752-9/472766591_3995151504036294_8149527529833759338_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeEWJIA86BVH6V1LgxP39ptP-qlylW6Y65j6qXKVbpjrmCNCZZBl2ziVjcjw4r1yv2QFCxt8UjpAIFt-REmuy28J&_nc_ohc=VudP8bTpd64Q7kNvgGfmJT2&_nc_zt=23&_nc_ht=scontent.fmnl4-1.fna&oh=03_Q7cD1gFSM1PtfM4UVgIuzQ4ytU-3j06ocK9apO5u3Y5aw4LBgw&oe=67A70BF0" class="card-img-top rounded-circle mx-auto mt-3" alt="Team Member" style="width: 150px; height: 150px; object-fit: cover; "></center>
                        <div class="card-body text-center p-4">
                            <h4 class="gradient-text fw-bold">Xevi Olivas</h4>
                            <p class="text-muted">Creative Director</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section mt-5 text-center text-white position-relative" data-aos="fade-up">
            <div class="position-relative">
                <h2 class="display-4 fw-bold mb-4">Join Us on Our Journey</h2>
                <p class="lead mb-4">Discover the joy of reading with us. Together, we can build a world where stories connect us all.</p>
                <a href="/books" class="btn btn-custom btn-lg">Browse Books</a>
            </div>
        </section>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true
    });
</script>

</body>
</html>
@endsection
