<?php
require("connection.php");
$db =$conn ->query("CREATE DATABASE db_portfolio");

if ($conn->connect_error) { 
    echo "Not successful: " . $conn->connect_error; 
} else {
    echo "Successful";
}

?>