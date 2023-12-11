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
    <style>
        a {
            color: #333;
        }
    </style>
</head>
<body class="vh-100" style="background-color:#f0faff;">
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
                <button type="submit" class="border btn btn-primary mt-3">Đăng ký</button>
                <ul class="form-func mb-0">
                    <li class="func-item mt-3">
                        Đã có tài khoản? <a href="?controller=login">Đăng nhập</a>
                    </li>
                </ul>
            </div>
           <?php
                 $statusRegis = $_SESSION['statusRegis'] ?? '';
                 echo "<p class='text-danger mt-2' id='statusRegis'>".$statusRegis."</p>"
            ?>
        </form>
    </div>
    <script>
        $('document').ready(function(){
            let ho = $('#ho');
            let ten = $('#ten');
            let email = $('#email');
            let sdt = $('#sdt');
            let matKhau = $('#matKhau');
            let reMatKhau = $('#reMatKhau');

            function checkHo()
            {
                let mau = /^[a-zA-Z]{2,19}$/;
                if (!mau.test(ho.val())) {
                    $("#statusRegis").html("Dữ liệu phải nhập từ 2 ký tự khác khoảng trống  trở lên, và không được nhập ký tự đặc biệt");
                    return false;
                }
                $("#statusRegis").html("");
                return true;
            }
            ho.blur(checkHo);

            function checkTen()
            {
                let mau = /^[a-zA-Z]{2,19}$/;
                if (!mau.test(ten.val())) {
                    $("#statusRegis").html("Dữ liệu phải nhập từ 2 ký tự khác khoảng trống  trở lên, và không được nhập ký tự đặc biệt");
                    return false;
                }
                $("#statusRegis").html("");
                return true;
            }
            ten.blur(checkTen);

            function checkEmail()
            {
                let mau = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if (!mau.test(email.val())) {
                    $("#statusRegis").html("Email nhập sai định dạng");
                    return false;
                }
                $("#statusRegis").html("");
                return true;
            }
            email.blur(checkEmail);

            function checkSdt()
            {
                let mau = /^[0-9]{10}$/;
                if (!mau.test(sdt.val())) {
                    $("#statusRegis").html("Số điện thoại phải là 10 số và không được chứa ký tự đặc biệt");
                    return false;
                }
                $("#statusRegis").html("");
                return true;
            }
            sdt.blur(checkSdt);

            function checkMatKhau()
            {
                let mau = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d!@#$%^&*+=()_-]{8,}$/;
                if (!mau.test(matKhau.val())) {
                    $("#statusRegis").html("Mật khẩu phải có từ 8 ký tự trở lên, và có một chữ cái viết hoa, một chữ cái viết thường và một số.");
                    return false;
                }
                $("#statusRegis").html("");
                return true;
            }
            matKhau.blur(checkMatKhau);

            function checkReMatKhau()
            {
                if (matKhau.val() != reMatKhau.val()) {
                    $("#statusRegis").html("Mật khẩu không trùng khớp");
                    return false;
                }
                $("#statusRegis").html("");
                return true;
            }
            reMatKhau.blur(checkReMatKhau);
            

        })
    </script>
</body>
</html>
