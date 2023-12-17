<?php
    define("PAGETITLE", 'Nhập điều biết ơn');
    include_once './view/navbar/vHeader.php';
    include_once './view/navbar/vNavbar.php';
?>
<form action="" class="d-flex mx-auto w-75 justify-content-center flex-column text-center p-5">
    <input type="text" name="controller" value="dieuBietOn" id="" hidden>
    <input type="text" name="action" value="save" id="" hidden>
    <h3 class="fw-bold mt-3 mb-5">Nhập điều biết ơn</h3>
    <input type="text" id="txtDieuBietOn" name="txtDieuBietOn" placeholder="Nội dung điều biết ơn" class="p-4" required>
    <input type="submit" class="btn btn-primary mt-5 w-25 mx-auto" id="btnSave" value="Lưu">
    <p id="err" class="mt-5 text-danger">

    </p>
</form>

<script>
    $(document).ready(function () {
        let dboInput = $('#txtDieuBietOn')
        let showError = $('#err')
        let btnSave = $('#btnSave')

        function checkInput() {
            let value = dboInput.val().trim();
            let mau = /^[ a-zA-Z0-9_-àáâãäèéđêëìíîïòóôõöưùúûüấầẩẫậắằẳẵặéèẻẽẹíìỉĩịóòỏõọơớờởỡợúùủũụýỳỷỹỵ]{2,}$/;
            if (value.length > 100) {
                showError.html("Nội dung bị giới hạn dưới 100 ký tự");
                return false;
            } else if (mau.test(value)) {
                showError.html(" ");
                return true;
            } else {
                showError.html("Nội dung phải chứa ít nhất 2 ký tự khác khoảng trắng và không chứa kí tự đặc biệt");
                return false;
            }
        }
        dboInput.blur(checkInput);
        
        btnSave.click(function (event)
        {
            if(checkInput() == false)
            {
                event.preventDefault();
            }
        })

    })
</script>
<?php
    include_once './view/navbar/vFooter.php';
?>