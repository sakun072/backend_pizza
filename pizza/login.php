<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<style>
    .center {
        margin: auto;
        width: 50%;
        border: 3px solid green;
        padding: 10px;
    }
</style>

<body style="background-color: coral;">
    <div class="card center" style="margin-top: 70px; width:400px">
        <img src="img/pizza2.png" alt="Pizza">
        <div class="card-body ">
            <div class="container mt-3">
                <h2 style="text-align: center;">BB Pizza</h2>
                <form method="post" action="process_login.php">
                    <div class="mb-3 mt-3">
                        <label for="email">อีเมล</label>
                        <input type="email" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="pwd">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <select class="form-select" aria-label="Default select example" name="myselect" id="myselect">
                        <option selected value="">---</option>
                        <option>ลูกค้า</option>
                        <option>เจ้าของร้าน</option>
                    </select>
                    <br><br>
                    <div style="display: flex; justify-content: center;">
                        <button type="submit" name="btnlogin" class="btn btn-primary" style="background-color: #ffaf4d;">เข้าสู่ระบบ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>