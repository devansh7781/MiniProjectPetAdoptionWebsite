<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your PHP Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
// Handle form submission and store details in MySQL

// Retrieve data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$role = $_POST['role'];

// Insert data into MySQL (Note: Use proper MySQLi or PDO to prevent SQL injection)
$servername = "localhost";
$username = "root";
$password = "yuvi2004"; // Replace with your MySQL password
$dbname = "pet"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the table (assuming the table is named 'your_table')
$sql = "INSERT INTO volunteer (name, email, phone, role) VALUES ('$name', '$email', '$phone', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "<div class='message'>";
    echo "<p>Registered Successfully</p>";
    echo "</div>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

</body>
</html>