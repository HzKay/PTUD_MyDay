<?php
include_once ("./model/connect.php");

class modelbieudocamxuc extends connectDB {
    function SelectAllbieudocamxuc($maND) {
        $conn = $this->connect();
        $query = "SELECT SUM(giaTri) AS total FROM camXuc WHERE maND = '{$maND}'";
        
        $table = mysqli_query($conn, $query);
       
        return $table;
    }

    function getCTVan($nhom)
    {
        $conn = $this->connect();
        $query = "SELECT * FROM cauTuVan WHERE nhom = {$nhom}";
        
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
}
?>
