<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Forbidden - Patch Bookstore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
            margin: 0;
            overflow: hidden;
        }

        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        .loader-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .error-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(50,50,93,.1), 0 5px 15px rgba(0,0,0,.07);
            padding: 40px;
            text-align: center;
            max-width: 600px;
            width: 100%;
            opacity: 0;
            transform: scale(0.9);
            transition: all 0.5s ease;
        }

        .loaded .error-container {
            opacity: 1;
            transform: scale(1);
        }

        .loaded .loader {
            opacity: 0;
            pointer-events: none;
        }

        .error-icon {
            font-size: 100px;
            color: #dc3545;
            margin-bottom: 20px;
        }

        .btn-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            transition: transform 0.3s ease;
        }

        .btn-custom:hover {
            transform: translateY(-3px);
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }

        .error-message {
            color: #6c757d;
            margin-bottom: 25px;
        }
    </style>
</head>
<body>
    <div class="loader">
        <div class="loader-spinner"></div>
    </div>

    <div class="error-container">
        <div class="error-icon">
            <i class="fas fa-lock"></i>
        </div>
        <h1 class="text-danger mb-4">Access Denied</h1>
        <p class="error-message">
            You do not have the necessary permissions to access this page.
            This area is restricted to admin users only.
        </p>
        <div class="d-flex justify-content-center gap-3">
            <a href="homepage" class="btn btn-custom btn-lg text-white px-4 py-2 rounded-pill">
                <i class="fas fa-home me-2"></i>Return to Home
            </a>

        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        window.addEventListener('load', function() {
            document.body.classList.add('loaded');
        });
    </script>
</body>
</html>
