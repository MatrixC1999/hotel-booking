<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Booking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
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
            padding: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn {
            border-radius: 30px;
            padding: 10px 20px;
        }
        .btn-primary {
            background-color: #3498db;
            border-color: #2980b9;
        }
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2471a3;
        }
        .btn-secondary {
            background-color: #95a5a6;
            border-color: #7f8c8d;
        }
        .btn-secondary:hover {
            background-color: #7f8c8d;
            border-color: #707b7c;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2><i class="fas fa-bookmark"></i> Create New Booking</h2>
            </div>
            <div class="card-body">
                <form action="<?= base_url('bookings/store') ?>" method="post">
                    <div class="form-group">
                        <label for="guest_id"><i class="fas fa-user"></i> Guest</label>
                        <select class="form-control" id="guest_id" name="guest_id" required>
                            <option value="">Select Guest</option>
                            <?php foreach ($guests as $guest): ?>
                                <option value="<?= esc($guest['id']); ?>"><?= esc($guest['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="room_id"><i class="fas fa-bed"></i> Room</label>
                        <select class="form-control" id="room_id" name="room_id" required>
                            <option value="">Select Room</option>
                            <?php foreach ($rooms as $room): ?>
                                <option value="<?= esc($room['id']); ?>"><?= esc($room['room_number']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="checkin_date"><i class="fas fa-calendar-day"></i> Check-in Date</label>
                        <input type="date" class="form-control" id="checkin_date" name="checkin_date" required>
                    </div>
                    <div class="form-group">
                        <label for="checkout_date"><i class="fas fa-calendar-times"></i> Check-out Date</label>
                        <input type="date" class="form-control" id="checkout_date" name="checkout_date" required>
                    </div>
                    <div class="form-group">
                        <label for="status"><i class="fas fa-check-circle"></i> Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Booking</button>
                        <a href="<?= base_url('bookings'); ?>" class="btn btn-secondary"><i class="fas fa-times-circle"></i> Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
