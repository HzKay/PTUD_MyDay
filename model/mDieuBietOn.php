<?php
    include_once "./model/connect.php";

    class mDieuBietOn extends connectDB
    {
        public function getDBOOfMonth ($month, $year,$maND)
        {
            $conn = $this->connect();
            $query = "SELECT * from `dieuBietOn` 
                        WHERE maND = '{$maND}' 
                        AND MONTH(thoiGian) = '{$month}'
                        AND YEAR(thoiGian) = '{$year}'";

            $result = $conn->query($query);
            $this->closeConnect($conn);
            return $result;
        }
        
        public function getTimeDBO($maND)
        {
            $conn = $this->connect();
            $query = "SELECT DISTINCT DATE_FORMAT(thoiGian, '%Y-%m') as thoiGian from `dieuBietOn` 
            WHERE maND = '{$maND}'
            ORDER BY thoiGian DESC";
            $result = $conn->query($query);

            $this->closeConnect($conn);
            return $result;
        }

        public function getDescDBO($maDBO, $maND)
        {
            $conn = $this->connect();
            $query = "SELECT * FROM `dieuBietOn` WHERE `maND` = '{$maND}' and `maDBO`= '{$maDBO}'; ";
            $result = $conn->query($query);
            
            $this->closeConnect($conn);
            return $result;
        }
    }
?>