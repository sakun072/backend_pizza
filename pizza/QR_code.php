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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="style.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <img src="img/pizzanav.png" alt="pizza" style="width:100px;" class="rounded-pill">

            <h5 class="navbar-brand" href="javascript:void(0)">BB Pizza</h5>
            <div class="collapse navbar-collapse" id="mynavbar">
            </div>

            <!-- <h5 class="navbar-brand" href="javascript:void(0)"><?php echo $wallet ?></h5> -->
            <img src="img/avatar.png" alt="Avatar" style="width:60px;" class="rounded-pill">
            <h5 class="navbar-brand" style="margin-left: 10px;" href="javascript:void(0)"> <?php echo $name ?></h5>

            <a href="showorder.php"> <img src="img/shop.png" alt="shoppingcart" style="width:60px;" class="rounded-pill"></a>

            <div class="dropdown">
                <img src="img/tap3.png" alt="hamburger icon" style="width:100px;" data-bs-toggle="dropdown">
                <ul class="dropdown-menu" style="size: 800px;">
                    <li><a class="dropdown-item" href="customer_menu.php">หน้าหลัก</a></li>
                    <li><a class="dropdown-item" href="showorder.php">รายการสั่งซื้อ</a></li>
                    <li><a class="dropdown-item" href="customer_bk.php">ประวัติการสั่งซื้อ</a></li>
                    <li><a class="dropdown-item" href="login.php">ออกจากระบบ</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row" style="display: flex; margin-top: 100px; justify-content: center; ">
        
        <img src="https://i.pinimg.com/originals/a8/69/40/a86940a4ed8a69539b341f3c414c47b3.png" 
        style="height: 500px; width: 500px; ">

          
    </div>
    
</body>

</html>