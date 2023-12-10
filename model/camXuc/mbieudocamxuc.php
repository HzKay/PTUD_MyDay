<?php
include_once ("./model/connect.php");

class modelbieudocamxuc extends connectDB {
    function SelectAllbieudocamxuc($maND) {
        $conn = $this->connect();
        $query = "SELECT SUM(giaTri) AS total FROM camXuc WHERE maND = '{$maND}'";
        
        $table = mysqli_query($conn, $query);
       
        return $table;
    }

    function getAllIDCTVan($nhom)
    {
        $conn = $this->connect();
        $query = "SELECT maCTV FROM cauTuVan WHERE nhom = {$nhom}";
        
        $table = mysqli_query($conn, $query);
       
        return $table;
    }

    function getAllMonth($maND)
    {
        $conn = $this->connect();
        $query = "SELECT DISTINCT DATE_FORMAT(thoiGian, '%Y-%m') as thoiGian from `camXuc` 
            WHERE maND = '{$maND}'
            ORDER BY thoiGian DESC";
        $table = mysqli_query($conn, $query);
       
        return $table;
    }

    function getCTVan($maCTV)
    {
        $conn = $this->connect();
        $query = "SELECT * FROM cauTuVan WHERE `maCTV` = {$maCTV}";
        
        $table = mysqli_query($conn, $query);
       
        return $table;
    }

    function saveAdvice($maCTV, $maND)
    {
        $conn = $this->connect();
        $query = "INSERT INTO nguoiDung_CauTuVan (`maND`, `maCTV`) VALUES ('{$maND}', '{$maCTV}')";
        $result = $this->excuteQuery($query);
       
        return $result;
    }

    function checkAdvice($thang, $nam, $maND)
    {
        $conn = $this->connect();
        $query = "SELECT maCTV FROM nguoiDung_CauTuVan WHERE MONTH(`thangNam`) = '{$thang}' AND YEAR(`thangNam`) = '{$nam}' AND `maND` = '{$maND}'";
        $table = mysqli_query($conn, $query);

        return $table;
    }

    function getCamXucOfMonth($maND, $month, $year)
    {
        $conn = $this->connect();
        $query = "SELECT giaTri FROM camXuc WHERE maND = {$maND} AND MONTH(thoiGian) = {$month} AND YEAR(thoiGian) = {$year}";
        $table = mysqli_query($conn, $query);
       
        return $table;
    }

    function saveEmotion($camXuc, $maND)
    {
        $query = "INSERT INTO `camXuc` (`giaTri`, `thoiGian`, `maND`) VALUES ('{$camXuc}', current_timestamp(), '{$maND}')";
        $status = $this->excuteQuery($query);

        return $status;
    }
}
?>
