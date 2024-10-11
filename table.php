<?php
require("connection.php");

// Corrected CREATE TABLE query
$tb = $conn->query(" CREATE TABLE IF NOT EXISTS contact_tb (
        id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        message VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB;
");

if ($tb) {
    echo 'successful';
} else {
    echo 'not successful: ' . $conn->error;
}
?>
