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
        
        <input type="text" id="noiDung" name="noiDung[]" required><br>
        </td>
        <td>
      
        <input type="time" id="thoiGianTH" name="thoiGianTH[]" required><br>
        </td>
        </tr>
    
        <tr>
        <td>
       
        <input type="text" id="noiDung" name="noiDung[]" required><br>
        </td>
        <td>
        <input type="time" id="thoiGianTH" name="thoiGianTH[]" required><br>
        </td>
        </tr>
        <tr>
        <td>
    
        <input type="text" id="noiDung" name="noiDung[]" required><br>
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
    <script>

    </script>
        
    </form>
<?php
    include_once './view/navbar/vFooter.php';
?>
