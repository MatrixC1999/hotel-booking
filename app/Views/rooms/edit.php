<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room</title>
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
            <h2>Edit Room</h2>
        </div>
        <div class="card-body">
            <form action="<?= base_url('rooms/update/' . $room['id']); ?>" method="post">
                <div class="form-group">
                    <label for="room_number">Room Number</label>
                    <input type="text" class="form-control" id="room_number" name="room_number" value="<?= esc($room['room_number']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="room_type">Room Type</label>
                    <input type="text" class="form-control" id="room_type" name="room_type" value="<?= esc($room['room_type']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?= esc($room['price']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="available" <?= $room['status'] == 'available' ? 'selected' : '' ?>>Available</option>
                        <option value="occupied" <?= $room['status'] == 'occupied' ? 'selected' : '' ?>>Occupied</option>
                        <option value="maintenance" <?= $room['status'] == 'maintenance' ? 'selected' : '' ?>>Maintenance</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Room</button>
                <a href="<?= base_url('rooms'); ?>" class="btn btn-secondary ml-2">Cancel</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
