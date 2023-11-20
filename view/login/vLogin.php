<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/checkInput.js"></script>
    <title>Đăng nhập</title>
</head>
<body>
    <div class="w-50 p-5 mx-auto">
        <h2 class="fw-bold text-center mb-4">Đăng nhập</h2>
        <form action="" method="post" class="mt-3">
            <input type="text" name="controller" value="login" hidden id="">
            <input type="text" name="action" value="login" hidden id="">
            <label class="form-label" for="maND">Tên đăng nhập</label>
            <input class="form-control" type="text" id="maND" name="txtUsername" required placeholder="Email hoặc số điện thoại">
        
            <label class="form-label mt-3" for="matKhau">Mật Khẩu</label>
            <input class="form-control" type="password" id="matKhau" name="txtMatKhau" required>
        
            <?php 
                $statusLogin = $_SESSION['statusLogin'] ?? '';
                echo "<p class='text-danger mt-4'>".$statusLogin."</p>";
            ?>
            <div class="text-center">
                <button type="submit" class=" btn btn-light mt-3">Đăng Nhập</button>
                <ul class="form-func">
                    <li class="func-item mt-3">
                        Quên mật khẩu? <a href="?controller=login&action=vForget">Lấy lại</a>
                    </li>
                    <li class="func-item mt-3">
                        Bạn chưa có tài khoản? <a href="?controller=login&action=vRegister">Đăng ký</a>
                    </li>
                </ul>
            </div>
        </form>       
    </div>
</body>
</html>