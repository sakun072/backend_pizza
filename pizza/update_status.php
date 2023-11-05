<?php
include 'condb.php';
session_start();
$email = $_SESSION['email'];

if (isset($_POST['bid'])) {
    echo $bid = $_POST['bid'];
    echo     $status = $_POST['status'];

    // ทำอะไรสักอย่างเพื่ออัปเดตสถานะของออร์เดอร์ที่มี $r_id ในฐานข้อมูล
    // ตัวอย่าง: 
    $stmt = $conn->prepare("UPDATE basket SET status_send = ? WHERE bid = ?");
    $stmt->bind_param("si", $status, $bid);
    if ($stmt->execute()) {
        // echo "อัปเดตสถานะสำเร็จ!";
        echo "<script>window.location.href = './owner_menu.php';</script>";
    } else {
        echo "มีข้อผิดพลาดในการอัปเดตสถานะ";
    }
}
