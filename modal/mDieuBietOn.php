<?php
    include_once "./modal/connect.php";

    class mDieuBietOn extends connectDB
    {
        public function handleDBO ($sql)
        {
            $conn = $this->connect();

            $isSuccess = $conn->query($sql);
            if($isSuccess)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        public function getAllDBO ($sql)
        {
            $conn = $this->connect();
            $result = $conn->query($sql);
            //$result = mysqli_fetch_all($result);
            return $result;
        }
    }
?>