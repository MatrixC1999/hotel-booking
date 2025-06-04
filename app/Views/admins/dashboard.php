<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }
        .card-header {
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            font-weight: bold;
            padding: 18px;
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
        }
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2471a3;
        }
        .btn-danger {
            background-color: #e74c3c;
            border-color: #c0392b;
        }
        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #a93226;
        }
        .btn-logout {
            width: auto;
            padding: 8px 20px;
            font-size: 14px;
        }
        .table {
            background-color: #ffffff;
        }
        .actions .btn {
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Dashboard</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Guests Section -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Guests</h4>
                            </div>
                            <div class="card-body">
                                <a href="<?= base_url('guests') ?>" class="btn btn-primary w-100">
                                    <i class="fas fa-users"></i> Guest List
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Bookings Section -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Bookings</h4>
                            </div>
                            <div class="card-body">
                                <a href="<?= base_url('bookings') ?>" class="btn btn-primary w-100">
                                    <i class="fas fa-calendar-check"></i> Bookings
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Rooms Section -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Rooms</h4>
                            </div>
                            <div class="card-body">
                                <a href="<?= base_url('rooms') ?>" class="btn btn-primary w-100">
                                    <i class="fas fa-bed"></i> Room List
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Payments Section -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Payments</h4>
                            </div>
                            <div class="card-body">
                                <a href="<?= base_url('payments') ?>" class="btn btn-primary w-100">
                                    <i class="fas fa-credit-card"></i> Transactions
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="<?= base_url('logout') ?>" class="btn btn-danger btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
