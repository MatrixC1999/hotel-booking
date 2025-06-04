<?php
// Database connection
$servername = "localhost";
$username = "root"; // default username for XAMPP
$password = ""; // default password for XAMPP
$dbname = "ci_project_db"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form input
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    // Hash the password before storing it
    $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

    // Prepare the SQL statement to insert the admin user
    $sql = "INSERT INTO admins (username, password) VALUES ('$admin_username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "New admin created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin</title>
</head>
<body>

<h2>Create Admin</h2>

<form action="create_admin.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">Create Admin</button>
</form>

</body>
</html>
