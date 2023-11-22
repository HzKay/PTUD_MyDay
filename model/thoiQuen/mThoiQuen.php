<?php
include_once "./model/connect.php";

class mThoiQuen {
    function getTq($maND){
        $conn = new connectDB();
        $sql = "SELECT DISTINCT noiDung FROM `thoiQuen` WHERE `maND` = {$maND} AND DATE_FORMAT(`thangNam`, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m')";
        $result = mysqli_query($conn->connect(), $sql);
        $conn->closeConnect($conn->connect());
        return $result;
    }

    public function insertStatusHabit($dsNoiDung, $id, $maND)
    {
        $conn = new connectDB();
        $today = date('d');
        foreach ($id as $item)
        {
            // echo $dsNoiDung[1];
            $sql = "INSERT INTO thoiQuen (noiDung, trangThai, maND) 
            VALUES 
            ('{$dsNoiDung[$item]}', '$today','{$maND}')";
            $result = mysqli_query($conn->connect(), $sql);
        }

        $conn->closeConnect($conn->connect());
        return $result;
    }

    function getStatusTq($noiDung, $thang, $nam, $maND){
        $conn = new connectDB();
        $sql = "SELECT trangThai FROM `thoiQuen` WHERE `noiDung` = N'{$noiDung}' AND YEAR(`thangNam`) = '{$nam}' AND MONTH(`thangNam`) = '{$thang}' AND `maND` = {$maND}";
        $result = mysqli_query($conn->connect(), $sql);
        $conn->closeConnect($conn->connect());
        return $result;
    }

    function insertThoiQuen($thoiQuenArray, $maND)
    {
        $conn = new connectDB();
        $thangNam = date('Y-m');

        foreach ($thoiQuenArray as $index => $thoiQuen) {
            $sql = "INSERT INTO thoiQuen (noiDung, thangNam, maND) 
                    VALUES ('$thoiQuen', now(), '{$maND}')";

            $result = mysqli_query($conn->connect(), $sql);
        }

        return $result;
    }
}       
?>