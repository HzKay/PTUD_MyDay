<?php
    require_once './model/connect.php';

    class mMucTieuThang extends connectDB
    {
        public function getMucTieuThang($maND, $time)
        {
            $conn = $this->connect();
            $query = "SELECT *
            FROM `mucTieuThang` AS m
            LEFT JOIN `chiTietMTT` AS cm ON m.maMTT = cm.maMTT
            WHERE m.maND = {$maND} 
            AND DATE_FORMAT(m.thangNam, '%Y-%m') = DATE_FORMAT('{$time}', '%Y-%m') ORDER BY cm.thangNam DESC LIMIT 3";
            $result = mysqli_query($conn, $query);
            $this->closeConnect($conn);
            return $result;
        }

        public function getOptionList($maND)
        {
            $conn = $this->connect();
            $query = "SELECT DISTINCT DATE_FORMAT(thangNam, '%Y-%m') as thangNam
            FROM `mucTieuThang`
            WHERE maND = {$maND}
            ";
            $result = mysqli_query($conn, $query);
            $this->closeConnect($conn);
            return $result;
        }

        public function saveData ($chuDe, $noiDung1, $noiDung2, $noiDung3, $maND) {
            $today = date('Y-m-d');
            $conn = $this->connect();
            $query = "INSERT INTO `mucTieuThang`(`chuDe`, `thangNam`, `maND` ) 
                        VALUES ('{$chuDe}', '{$today}', '{$maND}')
                        ON DUPLICATE KEY
                        UPDATE `chuDe` = '{$chuDe}'";
            $res = mysqli_query($conn, $query);

            if($res == 1)
            {
                $querymaMTT = "SELECT maMTT FROM `mucTieuThang` WHERE thangNam = '{$today}' AND maND = {$maND}";
                $temp = mysqli_query($conn, $querymaMTT);
                $maMTT = mysqli_fetch_array($temp);
                $query2 = "INSERT INTO `chiTietMTT`(`noiDung`, `maMTT` ) VALUES
                    ('{$noiDung1}', '{$maMTT['maMTT']}'),
                    ('{$noiDung2}', '{$maMTT['maMTT']}'),
                    ('{$noiDung3}', '{$maMTT['maMTT']}')";
                $res1 = mysqli_query($conn, $query2); 
                
                if($res1 == 1)
                {
                    return 1;
                }
            }
           
            return 0;
    
            
    
        }
    }
?>