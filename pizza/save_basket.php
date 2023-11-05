<?php
session_start();
include 'condb.php';

if (isset($_POST['omid']) && is_array($_POST['omid'])) {
    $sum = 0; // สร้างตัวแปรสำหรับรวมราคา

    foreach ($_POST['omid'] as $omid) {
        $stmt = $conn->prepare("SELECT * FROM orderamount WHERE omid = ?");
        $stmt->bind_param("i", $omid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $bid = $row['bid']+1;
        $temp = "";
        $stmt = $conn->prepare("UPDATE orderamount SET bid = ? , status = ? WHERE omid = ?");
        $stmt->bind_param("sss", $bid, $temp, $omid);
        $stmt->execute();

        $orderPrice = $row['oder_price'];
        $quantity_order = $row['quantity'];
        $sum += $orderPrice; // เพิ่มราคาลงในรวม
        $quantity_basket += $quantity_order; // เพิ่มราคาลงในรวม
    }

    echo "รวมราคา: " . $sum;
    $send = "nosend";
    $email = $_SESSION['email'];
  
    $stmt = $conn->prepare("SELECT * FROM customer WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    echo $row['cid'];
    $newaddress = $_POST['newaddress'] === "" || $_POST['newaddress'] === null ? $row['address'] : $_POST['newaddress'];
    $email = $_SESSION['email'];
    $sql = "INSERT INTO basket (amount, omid, cid, status_send, address, email, quantity) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("iissssi", $sum, $omid, $row['cid'], $send, $newaddress, $email, $quantity_basket);
    if ($stmt->execute()) {
    } else {
        echo "Error: " . $stmt->error;
    }
}
echo "<script>window.location.href = 'QR_code.php';</script>";
