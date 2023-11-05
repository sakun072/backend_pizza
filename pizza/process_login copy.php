<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $myselect = isset($_POST['myselect']) ? $_POST['myselect'] : "";

    // Validate that the user input is not empty
    if (!empty($username) && !empty($password) && !empty($myselect)) {
        $conn = mysqli_connect("localhost", "demo", "abc123", "demopz");

        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        mysqli_query($conn, "SET NAMES UTF8");

        if ($myselect == "ลูกค้า") {
            $sql = "SELECT * FROM customer WHERE email = ? AND password = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ss", $username, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                header("Location: customer_menu.php");
                exit();
            } else {
                echo "<script>alert('รหัสผ่านไม่ถูกต้อง');window.location.href = 'login.php';</script>";
            }
        } elseif ($myselect == "เจ้าของร้าน") {
            $sql = "SELECT * FROM owner WHERE email = ? AND password = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ss", $username, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                header("Location: owner_menu.php");
                exit();
            } else {
                echo "<script>alert('รหัสผ่านไม่ถูกต้อง');window.location.href = 'login.php';</script>";
            }
        }



        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน');window.location.href = 'login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <!-- ... (your HTML head content) ... -->
</head>

<body style="background-color: coral;">
    <!-- ... (your HTML form) ... -->

    <div class="error-message">
        <?php echo $error; ?>
    </div>
</body>

</html>