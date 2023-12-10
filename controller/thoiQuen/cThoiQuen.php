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

        public function vCheckHabit()
        {
            $maND = $_SESSION['userID'];
            $time =  date('Y-m-d');
            require_once './model/thoiQuen/mThoiQuen.php';
            $mThoiQuen = new mThoiQuen();
            $habitList = $mThoiQuen->getTq($maND, $time);

            require_once './view/thoiQuen/vDanhGiaTQ.php';
        }

        function index()
        {
            require_once './model/thoiQuen/mThoiQuen.php';
            $mThoiQuen = new mThoiQuen();
            $maND = $_SESSION['userID']; 
            $time = $_REQUEST['thoiGian'] ?? date('Y-m-d');
            $timeSelect = date('Y-m', strtotime($time));
            $xem = $mThoiQuen->getTq($maND, $time);
            $optionList = $mThoiQuen->getTimeOptions($maND);
            $isHabit = mysqli_num_rows($xem);

            if($isHabit > 0)
            {
                $lastDayOfMonth = date('t');
                $numHabit = mysqli_num_rows($xem);
    
                $habitList = [];
                $status= [];
                while ($thoiQuen = mysqli_fetch_array($xem))
                {
                    $habitList[] = $thoiQuen['noiDung'];
                }
                
                foreach($habitList as $habit) {
                    $temp = $mThoiQuen->getStatusTq($habit, $time, $maND);
                    $status[] =  $this->convertToArray($temp);// $this->convertToArray()
                }    
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

        public function insertStatusHabit()
        {
            $maND = $_SESSION['userID'];
            $id = $_REQUEST['today'];
            $today = date('d');
            $noiDung = $_REQUEST['noiDung'];
            
            require_once './model/thoiQuen/mThoiQuen.php';
            $mThoiQuen = new mThoiQuen();
            $result = $mThoiQuen->insertStatusHabit($noiDung, $id, $maND);

            if($result == 1)
            {
                header('location: ./?controller=viecQuanTrong&action=create');
            } else {
                header('location: ./?controller=thoiQuen&action=check');
            }
        }
    }
?>