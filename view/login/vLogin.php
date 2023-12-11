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
    <style>
        a {
            color: #333;
        }
    </style>
</head>
<body class="vh-100" style="background-color:#f0faff;">
    <div class="w-50 p-5 mx-auto">
        <h2 class="fw-bold text-center mb-4">Đăng nhập</h2>
        <form action="" method="post" class="mt-3">
            <input type="text" name="controller" value="login" hidden id="">
            <input type="text" name="action" value="login" hidden id="">
            <label class="form-label" for="maND">Tên đăng nhập</label>
            <input class="form-control p-2" type="text" id="maND" name="txtUsername" required placeholder="Email hoặc số điện thoại">
        
            <label class="form-label mt-3" for="matKhau">Mật Khẩu</label>
            <input class="form-control p-2" type="password" id="matKhau" name="txtMatKhau" required>
        
            <?php 
                $statusLogin = $_SESSION['statusLogin'] ?? '';
                echo "<p class='text-danger mt-4' id='statusLogin'>".$statusLogin."</p>";
            ?>
            <div class="text-center">
                <button type="submit" class=" btn btn-primary mt-3">Đăng Nhập</button>
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
    <script>
        $('document').ready(function(){
            let username = $('#maND');
            let matKhau = $('#matKhau');

            function checkUsername()
            {
                let mau = /^[a-zA-Z][a-zA-Z0-9]{2,}$/;
                if (!mau.test(username.val())) {
                    $("#statusLogin").html("Tên đăng nhập không phù hợp");
                    return false;
                }
                $("#statusLogin").html("");
                return true;
            }
            username.blur(checkUsername);

            function checkMatKhau()
            {
                let mau = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d!@#$%^&*+=()_-]{8,}$/;
                if (!mau.test(matKhau.val())) {
                    $("#statusLogin").html("Mật khẩu phải có từ 8 ký tự trở lên, và có một chữ cái viết hoa, một chữ cái viết thường và một số.");
                    return false;
                }
                $("#statusLogin").html("");
                return true;
            }
            matKhau.blur(checkMatKhau);
        })
    </script>
</body>
</html>