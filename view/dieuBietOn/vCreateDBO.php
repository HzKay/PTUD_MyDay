<?php
    define("PAGETITLE", 'Nhập điều biết ơn');
    include_once './view/navbar/vHeader.php';
    include_once './view/navbar/vNavbar.php';
?>
<form action="" class="d-flex mx-auto w-75 justify-content-center flex-column text-center p-5">
    <input type="text" name="controller" value="dieuBietOn" id="" hidden>
    <input type="text" name="action" value="save" id="" hidden>
    <h3 class="fw-bold mt-3 mb-5">Nhập điều biết ơn</h3>
    <input type="text" name="txtDieuBietOn" placeholder="Nội dung điều biết ơn" class="p-4" required>
    <input type="submit" class="btn btn-light mt-5 w-25 mx-auto" value="Lưu">
</form>

<?php
    include_once './view/navbar/vFooter.php';
?>