<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f4f6f9; /* Same light background */
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 40px;
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
            padding: 16px;
        }
        .table {
            background-color: #ffffff;
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
        .btn-warning {
            background-color: #f39c12;
            border-color: #f39c12;
        }
        .btn-warning:hover {
            background-color: #e67e22;
            border-color: #e67e22;
        }
        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }
        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .actions {
            display: flex;
            justify-content: space-around;
        }
        .btn-group .btn {
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Room List</h2>
            </div>
            <div class="card-body">
                <a href="<?= base_url('rooms/create') ?>" class="btn btn-primary mb-3">
                    <i class="fas fa-plus-circle"></i> Add New Room
                </a>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Room Number</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rooms as $room): ?>
                        <tr>
                            <td><?= esc($room['room_number']); ?></td>
                            <td><?= esc($room['room_type']); ?></td>
                            <td><?= esc($room['price']); ?></td>
                            <td><?= esc($room['status']); ?></td>
                            <td class="actions">
                                <a href="<?= base_url('rooms/edit/' . $room['id']) ?>" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="<?= base_url('rooms/delete/' . $room['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this room?')">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if (empty($rooms)): ?>
                        <tr>
                            <td colspan="5" class="text-center">No rooms found.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
