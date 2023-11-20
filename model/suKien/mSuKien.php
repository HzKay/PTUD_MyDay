<?php
    require_once './model/connect.php';

    class mSuKien extends connectDB
    {
        public function getEventList($maND)
        {
            $conn = $this->connect();
            $query = "SELECT * FROM `lichSuKien` WHERE `maND` = {$maND}";
            $result = mysqli_query($conn, $query);
            $this->closeConnect($conn);

            return $result;
        }

        public function insertEvent($eventName, $eventDate,$maND)
        {
            $conn = $this->connect();
            $query = "INSERT INTO `lichSuKien` (`thoiGian`, `suKien`, `maND`) VALUES ('{$eventDate}', '{$eventName}', '{$maND}')";
            $result = $this->excuteQuery($query);
            $this->closeConnect($conn);

            return $result;
        }
        
        
    }
?>