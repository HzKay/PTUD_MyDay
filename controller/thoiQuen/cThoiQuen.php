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
            
            header('location: ./?controller=thoiQuen');
        }

        public function viewFormCreate()
        {
            require_once './view/thoiQuen/vCreateTQ.php';
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

            $habitList = [];
            $status= [];
            while ($thoiQuen = mysqli_fetch_array($xem))
            {
                $habitList[] = $thoiQuen['noiDung'];
                // $array[] = $thoiQuen['noiDung'];
            }
            
            foreach($habitList as $habit) {
                $temp = $mThoiQuen->getStatusTq($habit, $thang, $nam, $maND);
                $status[] =  $this->convertToArray($temp);// $this->convertToArray()
            }
            
            include "./view/thoiQuen/vBieuDoTQ.php";
        }

        private function convertToArray($temp)
        {
            $arr = [];
            while($trangThai = mysqli_fetch_array($temp))
                {
                    $arr[] = $trangThai['trangThai'];
                }
            return $arr;
        }
    }
?>