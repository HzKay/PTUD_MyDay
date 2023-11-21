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

        function insertJob($jobList, $timeList, $maND, $ghiChu)
        {
            $conn = new connectDB();
            $id = 0;

            foreach ($jobList as $index => $job) {
                $time = $timeList[$id];
                $thoiGianTH = date('Y-m-d H:i:s', strtotime($time));
                $ngayMai = date("Y-m-d H:i:s", strtotime($thoiGianTH . " +1 day"));
                
                $sql = "INSERT INTO congViec (noiDung, thoiGianTH, maND, ghiChu) 
                        VALUES ('$job', '{$ngayMai}', '{$maND}', '{$ghiChu}')";

                $result = mysqli_query($conn->connect(), $sql);
                $id++;
            }

            return $result;
        }
    }
?>