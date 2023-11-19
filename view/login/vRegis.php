<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/checkInput.js"></script>
    <title>Đăng ký</title>
</head>
<body>
    <div class="form mx-auto w-50 p-3 mt-2">
        <h2 class="fw-bold text-center">Đăng ký</h2>
        <form action="./?controller=login&action=register" method="post">
            <label class="form-label mt-3" for="ho">Họ</label>
            <input class="form-control" type="text" id="ho" name="txtHo" required>

            <label class="form-label mt-3" for="ten">Tên</label>
            <input class="form-control" type="text" id="ten" name="txtTen" required>

            <label class="form-label mt-3" for="email">Email</label>
            <input class="form-control" type="email" id="email" name="txtEmail" required>

            <label class="form-label mt-3" for="sdt">Số Điện Thoại</label>
            <input class="form-control" type="text" id="sdt" name="txtSdt" required>

            <label class="form-label mt-3" for="matKhau">Mật Khẩu</label>
            <input class="form-control" type="password" id="matKhau" name="txtMatKhau" required>

            <label class="form-label mt-3" for="reMatKhau">Nhập lại mật khẩu</label>
            <input class="form-control" type="password" id="reMatKhau" name="txtReMatKhau" required>
            
            <div class="text-center">
                <button type="submit" class="border btn btn-light mt-3">Đăng ký</button>
                <ul class="form-func mb-0">
                    <li class="func-item mt-3">
                        Đã có tài khoản? <a href="?controller=login">Đăng nhập</a>
                    </li>
                </ul>
            </div>
           <?php
                 $statusRegis = $_SESSION['statusRegis'] ?? '';
                 echo "<p class='text-danger mt-2'>".$statusRegis."</p>"
            ?>
        </form>
    </div>
</body>
</html>
