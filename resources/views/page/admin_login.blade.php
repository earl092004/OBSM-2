<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Patch Bookstore</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-image: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .logo-background {
            position: fixed;
            width: 600px;
            height: 600px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            pointer-events: none;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.75);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            position: relative;
            z-index: 1;
            backdrop-filter: blur(7px);
        }

        h1 {
            font-size: 28px;
            margin-bottom: 30px;
            color: #333;
            text-align: center;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            color: #333;
            font-size: 14px;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 14px;
            border: 2px solid rgba(225, 225, 225, 0.8);
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.7);
        }

        .form-group input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
            background: rgba(255, 255, 255, 0.9);
        }

        .form-group button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.9), rgba(118, 75, 162, 0.9));
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-group button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.2);
            background: linear-gradient(135deg, rgb(8, 13, 35), rgba(118, 75, 162, 1));
        }

        .error {
            color: #dc3545;
            margin: 15px 0;
            padding: 12px;
            background: rgba(220, 53, 69, 0.1);
            border-radius: 12px;
            font-size: 14px;
        }

        .alert {
            padding: 14px;
            margin-bottom: 25px;
            border-radius: 12px;
            font-size: 14px;
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }

        .logo-background::before {
            content: '';
            width: 200px;
            height: 200px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            opacity: 10.0;
            background-image: url('{{ asset("public\img\logo1.png") }}');
        }
    </style>
</head>

<body>
    <div class="logo-background"> <img src="https://scontent.fcrk2-3.fna.fbcdn.net/v/t1.15752-9/462581569_2460914847574935_3880906068400133784_n.png?_nc_cat=107&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeHUJwT4CMFOtYjHpjbW7dNjOUTFEEnWEWY5RMUQSdYRZrteBvGt361mYuIUOYXTf-CZhAR5DEPD_d6GZVOP4l1-&_nc_ohc=Q2WRckaOprsQ7kNvgHaiXRW&_nc_zt=23&_nc_ht=scontent.fcrk2-3.fna&oh=03_Q7cD1gHMXj13Ze9yUQ0SLsqQm9OEqVT9Sp2D4iRjCUj8hnnsfQ&oe=67B858DE" alt=""></div>
    <div class="login-container">
        <h1>Admin Login - Patch Bookstore</h1>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required autofocus value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
