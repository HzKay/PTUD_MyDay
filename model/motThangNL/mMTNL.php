<?php
    include_once './model/connect.php';
    class mMTNL extends connectDB
    {
        public function get_Year_From_DB($maND)
        {
            $conn = $this->connect();
            $query = "SELECT DISTINCT YEAR(`thangNam`) AS `year` FROM `motThangNhinLai` WHERE `maND` = '{$maND}'";
            $listYear = mysqli_query($conn, $query);
            $this->closeConnect($conn);
            return $listYear;
        }

        public function getDataOfYear($thang, $nam, $maND)
        {
            $conn = $this->connect();
            $query = "SELECT * FROM `motThangNhinLai` WHERE MONTH(`thangNam`) = '{$thang}' AND YEAR(`thangNam`) = '{$nam}' AND `maND` = '{$maND}'";
            $result = mysqli_query($conn, $query);
            $this->closeConnect($conn);

            return $result;
        }

        public function save_MTNL($than, $tam, $tri, $maND, $time)
        {
            $conn = $this->connect();
            $query = "INSERT INTO `motThangNhinLai`(`than`, `tam`, `tri`, `maND`, `thangNam`) VALUES ('{$than}','{$tam}','{$tri}','{$maND}', '{$time}')";
            $status = $this->excuteQuery($query);
            $this->closeConnect($conn);
            return $status;
        }
    }
?>