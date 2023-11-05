<?php

$servername = "localhost";
$username = "demo";
$password = "abc123";
$dbname = "demopz";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
