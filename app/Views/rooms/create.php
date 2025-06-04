<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Room</title>
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
                <h2><i class="fas fa-bed"></i> Add New Room</h2>
            </div>
            <div class="card-body">
                <form action="<?= base_url('rooms/store') ?>" method="post">
                    <div class="form-group">
                        <label for="room_number"><i class="fas fa-hotel"></i> Room Number</label>
                        <input type="text" class="form-control" id="room_number" name="room_number" placeholder="Enter room number" required>
                    </div>
                    <div class="form-group">
                        <label for="room_type"><i class="fas fa-cogs"></i> Room Type</label>
                        <input type="text" class="form-control" id="room_type" name="room_type" placeholder="Enter room type" required>
                    </div>
                    <div class="form-group">
                        <label for="price"><i class="fas fa-peso-sign"></i> (₱) Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" placeholder="Enter price" required>
                    </div>
                    <div class="form-group">
                        <label for="status"><i class="fas fa-check-circle"></i> Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="available">Available</option>
                            <option value="occupied">Occupied</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Room</button>
                        <a href="<?= base_url('rooms'); ?>" class="btn btn-secondary"><i class="fas fa-times-circle"></i> Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
