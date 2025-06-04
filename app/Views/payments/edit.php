<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color:rgba(207, 189, 137, 0.78);
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
            border-color:rgb(7, 47, 128);
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
                <h2>Edit Payment</h2>
            </div>
            <div class="card-body">
                <form action="<?= base_url('payments/update/' . $payment['id']); ?>" method="post">
                    <div class="form-group">
                        <label for="booking_id">Booking</label>
                        <select class="form-control" id="booking_id" name="booking_id" required>
                            <option value="">Select Booking</option>
                            <?php foreach ($bookings as $booking): ?>
                                <option value="<?= $booking['id']; ?>" <?= $booking['id'] == $payment['booking_id'] ? 'selected' : ''; ?>>
                                    <?= esc($booking['id']); ?> - <?= esc($booking['guest_name']); ?> (<?= esc($booking['room_number']); ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amount_paid">Amount Paid</label>
                        <input type="text" class="form-control" id="amount_paid" name="amount_paid" value="<?= esc($payment['amount_paid']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="payment_date">Payment Date</label>
                        <input type="date" class="form-control" id="payment_date" name="payment_date" value="<?= esc($payment['payment_date']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <input type="text" class="form-control" id="payment_method" name="payment_method" value="<?= esc($payment['payment_method']); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
