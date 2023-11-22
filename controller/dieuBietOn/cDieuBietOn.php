<?php
    class cDieuBietOn
    {
        public function index()
        {
            $maND = $_SESSION['userID'];
            $time = $_REQUEST['time'] ?? date('mY');
            $month = substr($time, 0, 2);
            $year = substr($time, 2);

            require_once'./model/dieuBietOn/mDieuBietOn.php';
            $mDieuBietOn = new mDieuBietOn();
            $result = $mDieuBietOn->getDBOOfMonth($month, $year, $maND);
            $arr = $mDieuBietOn->getTimeDBO($maND);
            $option = [];

            while($item = mysqli_fetch_array($arr))
            {
                $option[] = $item['thoiGian'];
            }

            require_once'view/dieuBietOn/vDieuBietOn.php';
        }

        public function getDBO($maND)
        {
            $maDBO = $_GET['maDBO'];
            require_once'./model/dieuBietOn/mDieuBietOn.php';
            $mDieuBietOn = new mDieuBietOn();
            $result = $mDieuBietOn->getDescDBO($maDBO, $maND);
            $result = mysqli_fetch_array($result);
            require_once'./view/dieuBietOn/vChitietDBO.php';
        }

        public function getViewCreateDBO($maND)
        {
            require_once'./view/dieuBietOn/vCreateDBO.php';
        }

        public function saveDieuBietOn()
        {
            $maND = $_SESSION['userID'];
            $noiDungDBO = $_REQUEST['txtDieuBietOn'];

            include_once './model/dieuBietOn/mDieuBietOn.php';
            $mDieuBietOn = new mDieuBietOn();
            $status = $mDieuBietOn->saveDieuBietOn($noiDungDBO, $maND);
            if($status == 1)
            {
                echo "<script>alert('Thêm điều biết ơn thành công')</script>";   
                header('location: ./?controller=thoiQuen&action=check');
            } else {
                echo "<script>alert('Gặp lỗi khi thêm điều biết ơn')</script>";  
                require_once './view/dieuBietOn/vCreateDBO.php';
            }
        }
    }
?>