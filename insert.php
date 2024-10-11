<?php
require("connection.php");

if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
    
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    
    // Checks if the email already exist
    $checkEmail = $conn->query("SELECT * FROM contact_tb WHERE email = '$email'");

    if ($checkEmail->num_rows > 0) {
        echo "This email address is already registered.";
    } else {
        $insert = $conn->query("INSERT INTO contact_tb (name, email, message, created_at)
         VALUES ('$name', '$email', '$message', NOW())");

        if ($insert) {
            echo "Data inserted successfully!";
        } else {
            echo "Insert failed: " . $conn->error;
        }
    }
}
?>

