<?php
    include_once ("./model/connect.php");
    class modeldanhgia extends connectDB{
        function SelectAlldanhgia($yesterday, $maND){
            $conn = $this->connect();
            $query = "SELECT * FROM congViec WHERE maND = '{$maND}' AND DATE(`thoiGianTH`) = '{$yesterday}'";
            $table = mysqli_query($conn, $query);
            $this->closeConnect($conn);
            return $table;
        }
        function luu($trang, $ghi, $ma, $maND){
            $conn = $this->connect();
            $query = "UPDATE congViec SET trangThai ='".$trang."', ghiChu= N'".$ghi."' WHERE maCV = '".$ma."' AND maND = '{$maND}'";
            $table = mysqli_query($conn, $query);
            $this->closeConnect($conn);
            return $table;
        }
        
    }
?>