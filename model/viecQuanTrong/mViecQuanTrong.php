<?php
    require_once './model/connect.php';

    class mViecQuanTrong extends connectDB
    {
        public function getJobList ($thoiGian,$maND)
        {
            $conn = $this->connect();
            $query = "SELECT * from `congViec` 
                        WHERE maND = '{$maND}' 
                        AND DATE(thoiGianTH) = '{$thoiGian}'";
            $result = $conn->query($query);
            $this->closeConnect($conn);
            return $result;
        }
    }
?>