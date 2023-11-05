<?php
session_start();
$name = $_SESSION['name'];
$wallet = $_SESSION['wallet'];
include 'condb.php';
$id = $_GET['id'];
if (isset($id)) {
    $stmt = $conn->prepare("SELECT * FROM  food where fid=?");
    // 3.Bind Param
    $stmt->bind_param("i", $id);
    // 4. execute
    $stmt->execute();
    $result = $stmt->get_result();

    $stmtsize = $conn->prepare("SELECT * FROM  size ");
    // 4. execute
    $stmtsize->execute();
    $resultsize = $stmtsize->get_result();

    $stmtcrust = $conn->prepare("SELECT * FROM  crust ");
    // 4. execute
    $stmtcrust->execute();
    $resultcrust = $stmtcrust->get_result();

    while ($row = $result->fetch_assoc()) {
        // echo  $row['id_ctm'] . "<br>" . $row['music_data'] . " < br > " . $row['name']; 
?>
        <!doctype html>
        <html lang="th">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>BB PiZZA</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
            </script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link href="style.css" rel="stylesheet">
            <script>
                $(document).ready(function() {
                    $('.btn-number').click(function(e) {
                        e.preventDefault();

                        fieldName = $(this).attr('data-field');
                        input = $("input[name='" + fieldName + "']");
                        var currentVal = parseInt(input.val());

                        if (!isNaN(currentVal)) {
                            if ($(this).attr('data-type') == 'minus') {
                                if (currentVal > 1) { // Check that it's greater than 1
                                    input.val(currentVal - 1);
                                }
                            } else {
                                input.val(currentVal + 1);
                            }
                        } else {
                            input.val(1);
                        }
                    });

                    // Ensure that the input value is always a positive integer
                    $(".input-number").change(function() {
                        var value = parseInt($(this).val());
                        if (isNaN(value) || value < 1) {
                            $(this).val(1);
                        }
                    });
                });
            </script>
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
        <!-- ... rest of your HTML code ... -->


        <body class="bg" style="background-image: url('https://as2.ftcdn.net/v2/jpg/01/84/68/41/1000_F_184684173_nVVEGWpSCsZElyJo2SeyAuOA6GjtgU1K.jpg');">
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

            <div class="container-fluid" style="margin-top: 120px;">
                <div class="row">
                    <div class="col-12" style="display: flex; justify-content: end;">
                        <h1 class="text-light">BB PiZZA</h1>
                    </div>
                    <div class="col-4" style="display: flex; justify-content: end;">
                        <h3 class="text-light"><a href="customer_menu.php">หน้าแรก </a>
                            <?php echo "-";
                            echo $row['name']; ?></h3>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 20px; display: flex; justify-content: center;">
                <form action="orderamount.php?id=<?php echo $row["fid"] ?>" method="post">
                    <input type="hidden" name="fid" value="<?php echo $row["fid"]; ?>">
                    <input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
                    <div class="card" style="width: 18rem; text-align: center; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2); background-color: #fff;">
                        <img src="<?php echo $row['image'] ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text">Price: <?php echo $row['price'] ?> $</p>
                            <h5>SIZE:</h5>
                            <select class="form-select" aria-label="Default select example" name="sid" id="sid" required>
                                <option selected value="">---</option>
                                <?php
                                while ($rowsize = $resultsize->fetch_assoc()) {
                                    echo '<option value="' . $rowsize['sid'] . '">' . $rowsize['size_pizza'] . ' ' . $rowsize['size_price'] . '$</option>';
                                }
                                ?>
                            </select>
                            <h5>เลือกขอบ:</h5>
                            <select class="form-select" aria-label="Default select example" name="crid" id="crid" required>
                                <option selected value="">---</option>
                                <?php
                                while ($rowcrust = $resultcrust->fetch_assoc()) {
                                    echo '<option value="' . $rowcrust['crid'] . '">' . $rowcrust['crust_pizza'] . ' ' . $rowcrust['crust_price'] . '$</option>';
                                }
                                ?>
                            </select>
                            <h5>จำนวน:</h5>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quantity">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </span>
                                <input type="text" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quantity">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </span>
                            </div>
                            <button type="submit" name="btnlogin" class="btn btn-primary" style="background-color: #ffaf4d; margin-top: 10px;">เพิ่มใส่ตะกร้า</button>
                        </div>
                    </div>

                </form>

        </body>

        </html>
<?php    }
}
?>