<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Patch Bookstore</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                        url('https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') center/cover;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #007bff;
        }

        .form-group button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .form-group button:hover {
            transform: translateY(-2px);
        }

        .error {
            color: #dc3545;
            margin: 15px 0;
            padding: 10px;
            background: rgba(220, 53, 69, 0.1);
            border-radius: 8px;
        }

        .error ul {
            margin: 0;
            padding-left: 20px;
        }

        .signup-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }

        .signup-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        .back-button {
            position: absolute;
            top: -50px;
            left: 0;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.3s ease;
        }

        .back-button:hover {
            background: #fff;
        }

        .alert {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="login-container">


        <h1>Welcome To Patch Bookstore</h1>

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

        <form method="POST" action="{{ route('login') }}">
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

        <div class="signup-link">
            <p>Don't have an account? <a href="{{ route('create-user') }}">Sign up here</a></p>
        </div>
        <div class="signup-link">
            <p>Are you an Admin? <a href="{{ route('admin.login.form') }}">Login here</a></p>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
