<?php

echo "<script>window.location.herf='showorder.php'</script>";
include 'condb.php';
session_start();
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT bid, cid, omid, amount, time, status_send,  COUNT(*) AS duplicate_count
                        FROM basket
                        WHERE email = ?
                        GROUP BY cid, omid");

// 3. Bind Param
$stmt->bind_param("s", $email);
// 4. Execute
$stmt->execute();
$resulttotal = $stmt->get_result();

?>


<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BB PiZZA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="style.css" rel="stylesheet">
    <style>
                .navbar {
                    background-color: #ffffff;
                }

                .navbar-brand {
                    font-weight: bold;
                    font-size: 24px;
                }

                .user-info {
                    display: flex;
                    align-items: center;
                }

                .user-info img {
                    width: 60px;
                    border-radius: 50%;
                    margin-right: 10px;
                }
            </style>
</head>

<body class="bg" style="background-image: url('https://as2.ftcdn.net/v2/jpg/02/92/15/67/1000_F_292156795_gz1vVjiiQO8bGgQlN6d9XgW17QXakMTH.jpg');">
<nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
                <div class="container-fluid">
                    <img src="img/pizzanav.png" alt="pizza" style="width:100px;" class="rounded-pill">
                    <h5 class="navbar-brand">BB Pizza</h5>
                    <div class="collapse navbar-collapse" id="mynavbar"></div>
                    <div class="user-info">
                        <img src="img/avatar.png" alt="Avatar" style="width:60px;" class="rounded-pill">
                        <h5 class="navbar-brand"><?php echo $name ?></h5>
                        <a href="showorder.php"><img src="img/shop.png" alt="shoppingcart" style="width:60px;" class="rounded-pill"></a>
                        <div class="dropdown">
                            <img src="img/tap3.png" alt="hamburger icon" style="width:100px;" data-bs-toggle="dropdown">
                            <ul class="dropdown-menu navbar-dropdown">
                                <li><a class="dropdown-item" href="customer_menu.php">หน้าหลัก</a></li>
                                <li><a class="dropdown-item" href="showorder.php">รายการสั่งซื้อ</a></li>
                                <li><a class="dropdown-item" href="customer_bk.php">ประวัติการสั่งซื้อ</a></li>
                                <li><a class="dropdown-item" href="login.php">ออกจากระบบ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
    <form action="save_basket.php" method="post">
        <div class="row-10" style="margin-top: 120px;">
            <table class="table table-success table-striped">
                <thead>
                    <th>ออเดอร์ที่</th>
                    <th>วันเวลาที่สั่ง</th>
                    <th>ชื่อ</th>
                    <th>ราคารวม</th>
                    <th>สถานะ</th>
                    <th>action</th>
                </thead>

                <?php
                while ($row = $resulttotal->fetch_assoc()) {
                    $formId = 'form_' . $row["bid"]; // สร้าง id ที่ไม่ซ้ำกันโดยใช้ค่า bid

                    $cid = $row["cid"];

                    // Fetch other data based on fid, sid, and crid
                    $stmt = $conn->prepare("SELECT * FROM customer WHERE cid = ? ");
                    $stmt->bind_param("i", $cid);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $rowcustomer = $result->fetch_assoc();
                ?>
                    <form id="<?php echo $formId; ?>" method="post" action="./update_status.php">
                        <tbody>
                            <td><?php echo $row["bid"]; ?></td>
                            <td><?php echo $row["time"]; ?></td>
                            <td><?php echo $rowcustomer['name'] ?></td>
                            <td><?php echo number_format($row["amount"]); ?></td>
                            <td><?php if ($row["status_send"] == 'nosend') {
                                    echo "กำลังจัดส่ง";
                                } elseif ($row["status_send"] == 'send') {
                                    echo "จัดส่งแล้ว";
                                } ?></td>
                            <td><a href="showorder_detail_cus.php?bid=<?php echo $row["bid"] ?>">รายละเอียด</td>
                        </tbody>
                    </form>
                <?php
                }
                ?>

            </table>


        </div>
    </form>


</body>

</html>