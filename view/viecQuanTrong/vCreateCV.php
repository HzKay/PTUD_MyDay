<?php
    define('PAGETITLE', 'Tạo Công Việc');
    include_once './view/navbar/vHeader.php';
?>
<style>
    
label {
    display: block;
    margin-bottom: 5px;
}

input,
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
}

input[type="submit"] {
    cursor: pointer;
}input[type="reset"] {
    cursor: pointer;
}
</style>    
<?php
    include_once './view/navbar/vNavbar.php';
?>
    <h2 style="text-align: center;" class="mt-3">Tạo Công Việc</h2>
    <!-- <label for="time">Ngày</label>
    <input type=""> -->
    <form action="./" method="get" class="text-center" style="margin: 20px auto; max-width: 400px">
        <input type="text" name="controller" value="viecQuanTrong" hidden id="">
        <input type="text" name="action" value="save" hidden id="">
        <table>
            
            <th>Tên công việc</th>
            <th> Thời gian</th>
        <tr class="mt-2">
        <td>
        
        <input type="text" id="noiDung1" name="noiDung[]" required><br>
        </td>
        <td>
      
        <input type="time" id="thoiGianTH" name="thoiGianTH[]" required><br>
        </td>
        </tr>
    
        <tr>
        <td>
       
        <input type="text" id="noiDung2" name="noiDung[]" required><br>
        </td>
        <td>
        <input type="time" id="thoiGianTH" name="thoiGianTH[]" required><br>
        </td>
        </tr>
        <tr>
        <td>
    
        <input type="text" id="noiDung3" name="noiDung[]" required><br>
        </td>
        <td>
        <input type="time" id="thoiGianTH" name="thoiGianTH[]" required><br>
        </td>
        </tr>
        </table>
        <label for="ghiChu">Ghi Chú:</label>
        <textarea id="ghiChu" name="ghiChu" rows="4" cols="50" ></textarea><br>
        <td><input id="btnsm" type="submit" value="Lưu" class="btn btn-primary border" name = "btnsubmit"> </td>
        <td>  <input type="reset" class="btn btn-light border" value="Xoá"></td>
        <tr>
            <p id="err" class="mt-3 text-danger">

            </p>
        </tr>
    <script>
        
        $(document).ready(function () {
            let noiDung1 = $('#noiDung1')
            let noiDung2 = $('#noiDung2')
            let noiDung3 = $('#noiDung3')
            let showError = $('#err')
            let btnSave = $('#btnsm')

            function checkInput(input) {
                let value = input.val().trim();
                let mau = /^[ a-zA-Z0-9_-àáâãäèéđêëìíîïòóôõöưùúûüấầẩẫậắằẳẵặéèẻẽẹíìỉĩịóòỏõọơớờởỡợúùủũụýỳỷỹỵ]{2,}$/;
                if (value.length > 200) {
                    showError.html("Nội dung không được vượt quá 200 kí tự");
                    return false;
                } else if (value == '') {
                    showError.html("Vui lòng điền vào trường này");
                    return false;
                } else if (mau.test(value)) {
                    showError.html(" ");
                    return true;
                } else {
                    showError.html("Nội dung phải chứa ít nhất 2 ký tự khác khoảng trắng và không chứa kí tự đặc biệt");
                    return false;
                }
            }

            btnSave.click(function (event)
            {
                if(checkInput(noiDung1) == false || checkInput(noiDung2) == false || checkInput(noiDung3) == false)
                {
                    event.preventDefault();
                }
            })

        })
    </script>
    </form>
<?php
    include_once './view/navbar/vFooter.php';
?>
