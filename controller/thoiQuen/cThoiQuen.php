<?php
    class cThoiQuen
    {
        function saveThoiQuen()
        {
            require_once './model/thoiQuen/mThoiQuen.php';
            $maND = $_SESSION['userID'];      
            $thoiQuenArray = $_GET['TQ'];

            $mThoiQuen = new mThoiQuen();
            $result = $mThoiQuen->insertThoiQuen($thoiQuenArray, $maND);
            
            if ($result) {
                echo "<script>alert('Lưu thông tin thành công')</script>";
            } else {
                echo "<script>alert('Lưu thông tin thất bại')</script>";
            }
            
            include_once "./view/thoiQuen/vBieuDoTQ.php";
        }

        function index()
        {
            require_once './model/thoiQuen/mThoiQuen.php';
            $mThoiQuen = new mThoiQuen();
            $maND = $_SESSION['userID']; 
            $xem = $mThoiQuen->getTq($maND);
            $lastDayOfMonth = date('t');
            $thang = date('m');
            $nam = date('Y');
            $numHabit = mysqli_num_rows($xem);

            // $array = [];
            
            // while ($thoiQuen = mysqli_fetch_array($xem))
            // {
            //     $arr = [];
            //     $temp = $mThoiQuen->getStatusTq($thoiQuen['noiDung'], $thang, $nam, $maND);
            //     while($trangThai = mysqli_fetch_array($temp))
            //     {
            //         $arr[] = $trangThai['trangThai'];
            //     }
            // }
            include_once "./view/thoiQuen/vBieuDoTQ.php";
        }
    }
?>