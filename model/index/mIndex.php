<?php
    require_once './model/connect.php';

    class mIndex extends connectDB
    {
        public function getEventList($maND)
        {
            $conn = $this->connect();
            $query = "SELECT * FROM `lichSuKien` WHERE `maND` = {$maND}";
            $result = mysqli_query($conn, $query);
            $this->closeConnect($conn);

            return $result;
        }
    }
?>