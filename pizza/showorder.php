<?php

echo "<script>window.location.herf='showorder.php'</script>";
include 'condb.php';
session_start();
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$temp = "temp";
$total_price = 0;
$stmt = $conn->prepare("SELECT fid, sid, crid, oder_price, orderamount.omid AS omid, orderamount.quantity AS quantity
                        FROM orderamount
                        LEFT JOIN basket ON basket.bid = orderamount.bid
                        WHERE orderamount.email = ? AND orderamount.status = ?
                        GROUP BY fid, sid, crid");

// 3. Bind Param
$stmt->bind_param("ss", $email, $temp);
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
                    <th>ชื่อเมนู</th>
                    <th>ขนาด</th>
                    <th>ขอบ</th>
                    <th>ราคารวม</th>
                    <th>จำนวน</th>
                    <th>action</th>
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

                    $total_price += $row["oder_price"];
                ?>

                    <tbody>
                        <td><?php echo $rowfood["name"]; ?></td>
                        <td><?php echo $rowsize["size_pizza"]; ?></td>
                        <td><?php echo $rowcrust["crust_pizza"]; ?></td>
                        <td><?php echo number_format($row["oder_price"]) ?></td>
                        <td><?php echo $quantity; ?></td>
                        <td><a href="delete.php?id=<?php echo $row["omid"] ?>">ลบ</a></td>
                    </tbody>
                    <input type="hidden" name="omid[]" value="<?php echo $row["omid"]; ?>">
                <?php
                }
                ?>
            </table>
            <div style="display: flex; justify-content: end;background:#D1E7DD;">
                <h2 class="accordion-header">
                    ราคารวมทั้งหมด : <?= number_format($total_price) ?>
                </h2>
            </div>
            <div style="display: flex; justify-content: center;">
                <div class="accordion btn btn-primary" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                เพิ่มที่อยูใหม่
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <input type="text" name="newaddress" id="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div style="display: flex; margin-top: 20px; justify-content: center;">
                <button type="submit" class="btn btn-primary" style="background-color: #ffaf4d;">ยืนยันการสั่งซื้อ</button>
            </div>
        </div>
    </form>


</body>

</html>