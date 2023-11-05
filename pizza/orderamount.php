<?php
session_start();
include 'condb.php';
if (isset($_POST['fid'])) {
    $sid = $_POST['sid'];
    $crid = $_POST['crid'];
    $fid = $_POST['fid'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("SELECT * FROM crust  WHERE crid=?");
    $stmt->bind_param("i", $crid);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowcrust = $result->fetch_assoc();
    $crust_price = $rowcrust["crust_price"];

    $stmt = $conn->prepare("SELECT * FROM size  WHERE sid=?");
    $stmt->bind_param("i", $sid);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowsize = $result->fetch_assoc();
    $size_price = $rowsize["size_price"];
    $sum = ($crust_price + $size_price + $price) * $quantity;
    $active = 'Active';
    // Assuming you have already started the session, you can access $_SESSION['email'] here
    $email = $_SESSION['email'];

    $stmt = $conn->prepare("SELECT * FROM basket ORDER BY bid DESC LIMIT 1");
    $stmt->execute();
    $result = $stmt->get_result();
    $rowcrust = $result->fetch_assoc();
    $last_bid = $rowcrust["bid"];
    $temp = "temp";
    // Insert data into the orderamount table
    $sql = "INSERT INTO orderamount (fid, sid, crid, oder_price,email,bid,status,quantity) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("iiiisisi", $fid, $sid, $crid, $sum, $email, $last_bid, $temp, $quantity);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>window.location.href = 'customer_menu.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
