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
    <title>Quên mật khẩu</title>
</head>
<body>
    <div class="w-50 p-5 mx-auto">
        <h2 class="fw-bold text-center mb-4">Quên mật khẩu</h2>
        <form action="" method="post" class="mt-3">
            <input type="text" name="controller" value="login" hidden id="">
            <input type="text" name="action" value="forget" hidden id="">
            <label class="form-label" for="maND">Tên đăng nhập</label>
            <input class="form-control" type="text" id="maND" name="txtUsername" required>
        
            <label class="form-label mt-3" for="matKhau">Mật khẩu mới</label>
            <input class="form-control" type="password" id="matKhau" name="txtNewPass" required>
        
            <?php 
                $statusForget = $_SESSION['statusForget'] ?? '';
                echo "<p class='text-danger mt-4'>".$statusForget."</p>"?>
            <div class="text-center">
                <button type="submit" class="btn btn-light mt-3">Đặt lại mật khẩu</button>
            </div>
        </form>       
    </div>
</body>
</html>