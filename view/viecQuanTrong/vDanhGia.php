<?php

class viewdanhgia{
    function viewAlldanhgia(){
        define("PAGETITLE", 'Đánh giá công việc');
        include_once './view/navbar/vHeader.php';
        include_once './view/navbar/vNavbar.php';
        $yesterday = date("Y-m-d");

        echo "<div class='mt-4 text-center mx-auto'><h2>Đánh giá công việc hôm nay</h2>";
        date_default_timezone_set ("Asia/Ho_Chi_Minh");
        echo  "<strong class=''>Ngày: </strong>".date ("d/m/Y", strtotime($yesterday)). "<br><br>";  
        echo "<div style='border:1px solid black; padding:10px; width:50%; margin:0 auto; display:flex; flex-direction:column; align-items:center;'>";
        echo "<form method='post' class='' action='#'enctype='multipart/form-data' >";
        
        $p = new controldanhgia();
        $tbldanhgia = $p->getAlldanhgia($yesterday);
        $ghiChu = '';
        $button = "Lưu";
        if($tbldanhgia){
            $status = '';
            if($tbldanhgia->num_rows > 0){
                while ($row = $tbldanhgia->fetch_assoc()) {
                    $ghiChu = $ghiChu;
                    $time = date("Y-m-d", strtotime($row["thoiGianTH"]));
                    $hourToDo = date('H:i', strtotime($row["thoiGianTH"]));
                    if($time == $yesterday) {
                        echo '<div style="margin-bottom: 15px; display: flex; align-items: center; justify-content: space-between;">';
                        
                        if($row["trangThai"] == 1) {
                            echo '<input type="checkbox" checked name="trangthai[]" value="'.$row["maCV"].'" style="margin-right: 30px;margin-left:50px"> ';
                        } else {
                            echo '<input type="checkbox" name="trangthai[]" value="'.$row["maCV"].'" style="margin-right: 30px;margin-left:50px"> ';
                        }
                        echo '<a style="text-decoration: none; color: black; margin-left: 50px;margin-right: 150px">'.$row["noiDung"].'</a>';
                        echo '<span style="display: inline-block; width: 100px; text-align: center;">'.$hourToDo.'</span>';
                        echo '</div>';
                    }}
            }else{
                echo "Không có công việc";
                $status = 'disabled';
                $button = 'Tiếp tục';
            }
        }else{
            echo "Error";
        }
        
        echo "</div>";
        echo "<h4 class='mt-4'><strong>Ghi chú</strong></h4>";
        echo "<input type='text' value='{$ghiChu}' '' {$status} name='ghichu' class='p-3' style='width:50%;height:80px; margin:0 auto; display:table;'>";

        echo "<br><button type='submit' class='btn btn-primary border' name='submit'>{$button}</button>";
        echo "<br><p id='err' class='mt-3 text-danger'> </p>";
        echo "</form></div>";
    }
}

echo "<script>
window.onload = function() {
    document.getElementsByName('ghichu')[0].addEventListener('input', function(e) {
        var regex = /[!@#$%^&*()_+\-=\[\]{};':\"\\|<>\/?]+/;
        var noti = document.getElementById('err');
        var value = e.target.value.trim();

        if(value == '' || value.length < 2) {
            document.getElementsByName('submit')[0].disabled = true;
            noti.innerHTML = 'Ghi chú phải chứa ít nhất 2 ký tự khác khoảng trắng';
        } else if(value.length > 200) {
            document.getElementsByName('submit')[0].disabled = true;
            noti.innerHTML = 'Ghi chú bị giới hạn 200 kí tự';
        } else if(regex.test(value)) {
            document.getElementsByName('submit')[0].disabled = true;
            noti.innerHTML = 'Ghi chú không được chứa ký tự đặc biệt';
        } else {
            document.getElementsByName('submit')[0].disabled = false;
            noti.innerHTML = ' ';
        }
    });
}
</script>";
include_once("./controller/danhGia/cdanhgia.php");

if (isset($_REQUEST["submit"]) && $_REQUEST["action"] != 'index') {
  $trang = isset($_REQUEST["trangthai"]) ? $_REQUEST["trangthai"] : array();
  $ghi = $_REQUEST["ghichu"];
  $maND = $_SESSION["userID"];
  // Check if there are no selected checkboxes
  if (empty($trang)) {
    $trang = array(0); // Add a dummy value to the array
  }

  if (strlen($ghi) > 200) {
    echo "<script>alert('Ghi chú không được vượt quá 200 ký tự')</script>";
  } else {
    $p = new controldanhgia();
    $selectedMaCVs = array_slice($trang, 0,6); // Select up to 6 maCVs
    $kq = false; // Initialize $kq here

    foreach ($selectedMaCVs as $maCV) {
      $trangthai = in_array($maCV, $trang) ? 1 : 0;
      $kq = $p->luu($trangthai, $ghi, $maCV, $maND);

      if (!$kq) {
        echo "<script>alert('Lỗi thêm dữ liệu')</script>";
        break;
      }
    }

    if ($kq) {
      echo "<script>alert('Lưu thành công')</script>";
      header('location: ./?controller=camXuc&action=create');
    }
  }
}
?>
