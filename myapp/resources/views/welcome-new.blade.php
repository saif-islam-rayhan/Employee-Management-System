<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Employee Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .welcome-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 500px;
            padding: 60px 40px;
            text-align: center;
        }

        .welcome-icon {
            font-size: 64px;
            color: #667eea;
            margin-bottom: 20px;
        }

        .welcome-title {
            color: #2c3e50;
            font-weight: 700;
            font-size: 32px;
            margin-bottom: 15px;
        }

        .welcome-subtitle {
            color: #7f8c8d;
            font-size: 16px;
            margin-bottom: 40px;
        }

        .btn-welcome {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.2s;
            text-decoration: none;
            display: inline-block;
            margin: 10px;
        }

        .btn-welcome:hover {
            transform: translateY(-2px);
            color: white;
        }

        .btn-register {
            background: white;
            border: 2px solid #667eea;
            color: #667eea;
        }

        .btn-register:hover {
            background: #667eea;
            color: white;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div class="welcome-icon">
            <i class="bi bi-briefcase"></i>
        </div>
        <h1 class="welcome-title">Employee Management System</h1>
        <p class="welcome-subtitle">Manage your employees and attendance effortlessly</p>

        <div class="mt-5">
            <a href="{{ route('login') }}" class="btn btn-welcome">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </a>
            <a href="{{ route('register') }}" class="btn btn-welcome btn-register">
                <i class="bi bi-person-plus"></i> Register
            </a>
        </div>

        <hr class="my-4">

        <p class="small text-muted">
            <strong>Demo Credentials:</strong><br>
            Admin Email: admin@example.com | Password: password123<br>
            Employee Email: john@example.com | Password: password123
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
