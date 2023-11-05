<?php
session_start();
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$wallet = $_SESSION['wallet'];
include 'condb.php';
$stmt = $conn->prepare("SELECT * FROM  food");
// 4. execute
$stmt->execute();
$result = $stmt->get_result();

?>
<!doctype html>
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
        /* Add your custom CSS styles here */
        .bg {
            background-image: url('https://img.freepik.com/premium-vector/seamless-pattern-with-pizza-slices-ingredients_75047-9.jpg?w=740');
            background-size: cover;
        }

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

        .food-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
        }

        .food-card:hover {
            transform: scale(1.05);
        }
    </style>

</head>

<body class="bg">
    <nav class="navbar navbar-expand-sm navbar-light fixed-top">
        <div class="container-fluid">
            <img src="img/pizzanav.png" alt="pizza" style="width:100px;" class="rounded-pill">
            <h5 class="navbar-brand">BB Pizza</h5>
            <div class="collapse navbar-collapse" id="mynavbar"></div>
            <div class="user-info">
                <h5 class="navbar-brand"><?php echo $wallet ?></h5>
                <img src="img/avatar.png" alt="Avatar">
                <h5 class="navbar-brand"><?php echo $name ?></h5>
                <a href="showorder.php"><img src="img/shop.png" alt="shoppingcart" style="width:60px;" class="rounded-pill"></a>
                <div class="dropdown">
                    <img src="img/tap3.png" alt="hamburger icon" style="width:100px;" data-bs-toggle="dropdown">
                    <ul class="dropdown-menu" style="size: 100px; justify-content: right;">
                        <li><a class="dropdown-item" href="customer_menu.php">หน้าหลัก</a></li>
                        <li><a class="dropdown-item" href="showorder.php">รายการสั่งซื้อ</a></li>
                        <li><a class="dropdown-item" href="customer_bk.php">ประวัติการสั่งซื้อ</a></li>
                        <li><a class="dropdown-item" href="login.php">ออกจากระบบ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="col-md-4 mb-4">
                    <div class="food-card">
                        <a href="showmenu.php?id=<?php echo $row["fid"] ?>">
                            <img class="zoom rcorner" src="<?php echo $row['image'] ?>" width="100%" height="200">
                        </a>
                        <h5><?php echo "ราคา: " . $row['price'] . "$" ?></h5>
                        <h5><?php echo "ชื่อ: " . $row['name'] ?></h5>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>