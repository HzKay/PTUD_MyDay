<?php
include_once './view/navbar/vHeader.php';
include_once './view/navbar/vNavbar.php';
?>
<h2>Đăng Nhập</h2>
<form action="process_login.php" method="post">
    <label for="maND">Mã Người Dùng:</label>
    <input type="text" id="maND" name="maND" required>

    <label for="matKhau">Mật Khẩu:</label>
    <input type="password" id="matKhau" name="matKhau" required>

    <label for="ho">Họ:</label>
    <input type="text" id="ho" name="ho" required>

    <label for="ten">Tên:</label>
    <input type="text" id="ten" name="ten" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="sdt">Số Điện Thoại:</label>
    <input type="text" id="sdt" name="sdt" required>

    <button type="submit">Đăng Nhập</button>
</form>

<?php
include_once './view/navbar/vFooter.php';
?>
