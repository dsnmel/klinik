<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Klinik Kurnia Medika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fa;
        }
        .login-container {
            display: flex;
            height: 100vh;
        }
        .left {
            background-color: white;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .right {
            background-color: #44b14e;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-box {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .form-box input {
            margin-bottom: 15px;
        }
        .logo {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px; /* Tambahkan margin bawah untuk space antara label dan input */
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="left">
            <div class="logo">
                <img src="img/logo-fiks.png" alt="WebsiteDesa" width="300"> <!-- Ganti dengan logo -->
            </div>
        </div>
        <div class="right">
            <div class="form-box">
                <h4 class="text-center mb-4">Login</h4>
                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">username</label>
                        <input name="username" class="form-control" placeholder="username" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" name="password" class="form-control" placeholder="password" required>
                    </div>
                    <button type="submit" class="btn btn-success">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
