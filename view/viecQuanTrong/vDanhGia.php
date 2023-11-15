<?php
include_once './view/navbar/vHeader.php';
include_once './view/navbar/vNavbar.php';
class viewdanhgia{
    function viewAlldanhgia($maND){
        $p = new controldanhgia();
        $tbldanhgia = $p->getAlldanhgia($maND);
        if($tbldanhgia){
            if($tbldanhgia->num_rows > 0){
                echo "<div class='mt-5 d-flex align-items-center flex-column w-75 text-center mx-auto justify-content-center'><h2>Đánh giá công việc hôm nay</h2>";
                date_default_timezone_set ("Asia/Ho_Chi_Minh");
                echo  "<p><strong>Ngày: </strong>".date ("d/m/Y"). "</p><br>";  
                echo "<div style='border:1px solid black; padding:10px; width:50%;height:200px; margin:0 auto; display:flex;  align-items:center;'>";
                echo "<form method='post' action='#'enctype='multipart/form-data' >";
                while($row = $tbldanhgia->fetch_assoc()){
                    // $thoiGian = $row["thoiGianTH"];
                    $thoiGian = date('H:i', strtotime($row["thoiGianTH"]));
                    echo '<div style="margin-bottom: 15px; display: flex; align-items: center; justify-content: space-between;">';
                    if($row['trangThai'] == 1)
                    {
                        echo '<input type="checkbox" checked name="trangthai[]" value="'.$row["maCV"].'" style="margin-right: 30px;margin-left:50px"> ';
                    }else{
                        echo '<input type="checkbox" name="trangthai[]" value="'.$row["maCV"].'" style="margin-right: 30px;margin-left:50px"> ';
                    }
                    echo '<a style="text-decoration: none; color: black; margin-left: 50px;margin-right: 150px">'.$row["noiDung"].'</a>';
                    echo '<span style="display: inline-block; width: 100px; text-align: center;">'.$thoiGian.'</span>';
                    echo '</div>';
                }
                echo "</div>";
                echo "<h4 class='mt-4'><strong>Ghi chú</strong></h4>";
                echo "<input type='text' name='ghichu' style='width:50%;height:80px; margin:0 auto; display:table;'>";
                echo "<br><input type='submit' class='btn btn-light w-25 mt-3' name='submit' value='Lưu'>";
                echo "</form></div>";
            }else{
                echo "0 result";
            }
        }else{
            echo "Error";
        }
    }
}




include_once("./controller/danhGia/cdanhgia.php");
if(isset($_REQUEST["submit"])){
    $trang = isset($_REQUEST["trangthai"]) ? $_REQUEST["trangthai"] : array();
   
    $ghi = $_REQUEST["ghichu"];
    if(strlen($ghi) > 200){
        echo "<script>alert('Ghi chú không được vượt quá 200 ký tự')</script>";
    } else {
        $p = new controldanhgia();
        $selectedMaCVs = array_slice($trang, 0, 6); // Select up to 6 maCVs
        $kq = false; // Initialize $kq here
        // $maND = _$_REQUEST['maND'];
        $maND = 1;
        foreach($selectedMaCVs as $maCV){
            $trangthai = in_array($maCV, $trang) ? 1 : 0;
            $kq = $p -> luu($trangthai,$ghi,$maCV, $maND);
            if(!$kq){
                echo "<script>alert('Lỗi thêm dữ liệu')</script>";
                break;
            }
        }
        if($kq){
            echo "<script>alert('Lưu thành công')</script>";
        }
    }
}
include_once './view/navbar/vFooter.php';
?>
