<?php
    require_once './model/connect.php';

    class mMucTieuThang extends connectDB
    {
        public function getMucTieuThang($maND)
        {
            $conn = $this->connect();
            $query = "SELECT * FROM `mucTieuThang` as m LEFT JOIN `chiTietMTT` as cm ON m.maMTT = cm.maMTT WHERE maND = {$maND}";

            $result = mysqli_query($conn, $query);
            $this->closeConnect($conn);
            return $result;
        }
    }
?>