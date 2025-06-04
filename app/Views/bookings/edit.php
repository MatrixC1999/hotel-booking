<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: rgba(207, 189, 137, 0.78);
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #ffc107;
            color: #fff;
            text-align: center;
            font-weight: bold;
            padding: 20px;
        }
        .btn-primary {
            border-radius: 50px;
            transition: background-color 0.3s ease;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: rgb(7, 47, 128);
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Edit Booking</h2>
            </div>
            <div class="card-body">
                <form action="<?= base_url('bookings/update/' . $booking['id']) ?>" method="post">
                    <div class="form-group">
                        <label for="guest_id">Guest</label>
                        <select class="form-control" id="guest_id" name="guest_id" required>
                            <?php foreach ($guests as $guest): ?>
                                <option value="<?= esc($guest['id']); ?>" <?= $guest['id'] == $booking['guest_id'] ? 'selected' : ''; ?>>
                                    <?= esc($guest['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="room_id">Room</label>
                        <select class="form-control" id="room_id" name="room_id" required>
                            <?php foreach ($rooms as $room): ?>
                                <option value="<?= esc($room['id']); ?>" <?= $room['id'] == $booking['room_id'] ? 'selected' : ''; ?>>
                                    <?= esc($room['room_number']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="checkin_date">Check-in Date</label>
                        <input type="date" class="form-control" id="checkin_date" name="checkin_date" value="<?= esc($booking['checkin_date']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="checkout_date">Check-out Date</label>
                        <input type="date" class="form-control" id="checkout_date" name="checkout_date" value="<?= esc($booking['checkout_date']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="pending" <?= $booking['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                            <option value="confirmed" <?= $booking['status'] == 'confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                            <option value="completed" <?= $booking['status'] == 'completed' ? 'selected' : ''; ?>>Completed</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Booking</button>
                    <a href="<?= base_url('bookings'); ?>" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
