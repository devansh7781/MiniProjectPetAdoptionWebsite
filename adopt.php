<?php
// adopt.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $petName = $_POST['petname'];
    $parentName = $_POST['parentname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Perform data validation if needed

    // Connect to your MySQL database (replace with your actual credentials)
    $conn = new mysqli("localhost", "root", "yuvi2004", "pet");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO parent (pet_name, parent_name, phone, email, address) 
            VALUES ('$petName', '$parentName', '$phone', '$email', '$address')";

    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully
        $conn->close();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
    }

    // Redirect to test.php with email and parent name
    header("Location: test.php?email=$email&parentname=$parentName");
    exit();
}
?>
