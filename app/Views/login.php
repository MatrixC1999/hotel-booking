<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hotel Booking System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }
        .system-title {
            text-align: center;
            margin-top: 30px;
            font-size: 40px;
            font-weight: bold;
            color: #2c3e50;
        }
        .login-container {
            max-width: 350px;
            margin: 35px auto;
        }
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        .card-header {
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            font-weight: bold;
            padding: 16px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .btn {
            border-radius: 30px;
            transition: background-color 0.3s ease;
        }
        .btn-primary {
            background-color: #3498db;
            border-color: #2980b9;
            padding: 6px 25px;
            font-size: 15px;
        }
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2471a3;
        }
        .alert {
            font-size: 14px;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Title outside the login box -->
    <div class="system-title">
        Hotel Booking System
    </div>

    <!-- Login Card -->
    <div class="login-container">
        <div class="card">
            <div class="card-header">
                <h4>Admin Login</h4>
            </div>
            <div class="card-body">
                <?php if (session()->get('error')): ?>
                    <div class="alert alert-danger"><?= session()->get('error') ?></div>
                <?php endif; ?>

                <form action="<?= base_url('auth/processLogin') ?>" method="POST">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
