<?php
session_start();
ob_start();
$servername = "localhost";
$username = "demo";
$password = "abc123";
$dbname = "demopz2";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>