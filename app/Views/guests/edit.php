<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guest</title>
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
                <h2>Edit Guest</h2>
            </div>
            <div class="card-body">
            <form action="<?= base_url('guests/update/' . $guest['id']); ?>" method="post">
            <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= esc($guest['name']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= esc($guest['email']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= esc($guest['phone_number']); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Guest</button>
                    <a href="<?= base_url('guests') ?>" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>
