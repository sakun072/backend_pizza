<?php

echo "<script>window.location.herf='showorder.php'</script>";
include 'condb.php';
session_start();
$bid = $_GET['bid'];
$name = $_SESSION['name'];
$temp = "temp";
$stmt = $conn->prepare("SELECT * FROM orderamount
                        WHERE orderamount.bid = ? AND status != ?");

// 3. Bind Param
$stmt->bind_param("is", $bid, $temp);
// 4. Execute
$stmt->execute();
$resulttotal = $stmt->get_result();

$stmt = $conn->prepare("SELECT *,basket.address AS basket_address FROM basket LEFT JOIN customer ON customer.cid = basket.cid WHERE bid = ?");
$stmt->bind_param("i", $bid);
$stmt->execute();
$result = $stmt->get_result();
$rows = $result->fetch_assoc();
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
                <h5 class="navbar-brand"><?php echo "เจ้าของร้าน" ?></h5>
                <div class="dropdown">
                    <img src="img/tap3.png" alt="hamburger icon" style="width:100px;" data-bs-toggle="dropdown">
                    <ul class="dropdown-menu navbar-dropdown">
                        <li><a class="dropdown-item" href="owner_menu.php">หน้าหลัก</a></li>
                        <li><a class="dropdown-item" href="login.php">ออกจากระบบ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="row-10" style="margin-top: 120px;">
        <div style="display: flex; justify-content: center;background:#D1E7DD;">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col">
                            <h4 class="accordion-header">
                                ออเดอร์ที่ : <?= $rows["bid"] ?>
                            </h4>
                        </div>
                        <div class="col">
                            <h4 class="accordion-header">
                                ชื่อ : <?= $rows["name"] ?>
                            </h4>
                        </div>
                        <div class="col">
                            <h4 class="accordion-header">
                                ที่อยู่ : <?= $rows["basket_address"] ?>
                            </h4>
                        </div>
                        <div class="col">
                            <h4 class="accordion-header">
                                เบอร์โทรศัพท์ : <?= $rows["phone"] ?>
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col">
                            <h4 class="accordion-header">
                                ราคารวมทั้งหมด : <?= number_format($rows["amount"]) ?>
                            </h4>
                        </div>
                        <div class="col">
                            <h4 class="accordion-header">
                                จำนวนทั้งหมด : <?= number_format($rows["quantity"]) ?>
                            </h4>
                        </div>
                        <div class="col">
                            <h4 class="accordion-header">
                                สั่งเมื่อเวลา : <?= $rows["time"] ?>
                            </h4>
                        </div>
                        <div class="col">
                            <h4 class="accordion-header">
                                สถานะจัดส่ง : <?= $rows["status_send"] == "send" ? "จัดส่งแล้ว" : "กำลังจัดส่ง" ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-success table-striped">
            <thead>
                <th width="50px">รูป</th>
                <th>ชื่อเมนู</th>
                <th>ขนาด</th>
                <th>ขอบ</th>
                <th>ราคารวม</th>
                <th>จำนวน</th>
            </thead>

            <?php
            while ($row = $resulttotal->fetch_assoc()) {
                $fid = $row["fid"];
                $sid = $row["sid"];
                $crid = $row["crid"];
                $quantity = $row["quantity"];

                // Fetch other data based on fid, sid, and crid
                $stmt = $conn->prepare("SELECT * FROM food WHERE fid = ? ");
                $stmt->bind_param("i", $fid);
                $stmt->execute();
                $result = $stmt->get_result();
                $rowfood = $result->fetch_assoc();

                $stmt = $conn->prepare("SELECT * FROM size WHERE sid = ? ");
                $stmt->bind_param("i", $sid);
                $stmt->execute();
                $result = $stmt->get_result();
                $rowsize = $result->fetch_assoc();

                $stmt = $conn->prepare("SELECT * FROM crust WHERE crid = ? ");
                $stmt->bind_param("i", $crid);
                $stmt->execute();
                $result = $stmt->get_result();
                $rowcrust = $result->fetch_assoc();
            ?>

                <tbody>
                    <td><img style="width: 300px;" src="<?php echo $rowfood['image'] ?>" class="card-img-top" alt="..."></td>
                    <td><?php echo $rowfood["name"]; ?></td>
                    <td><?php echo $rowsize["size_pizza"]; ?></td>
                    <td><?php echo $rowcrust["crust_pizza"]; ?></td>
                    <td><?php echo number_format($row["oder_price"]); ?></td>
                    <td><?php echo $quantity; ?></td>
                </tbody>
                <input type="hidden" name="omid[]" value="<?php echo $row["omid"]; ?>">
            <?php
            }
            ?>
        </table>
    </div>


</body>

</html>