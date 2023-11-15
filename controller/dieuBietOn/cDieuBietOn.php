<?php
    class cDieuBietOn
    {
        public function index($maND)
        {
            $time = $_REQUEST['time'] ?? date('mY');
            $month = substr($time, 0, 2);
            $year = substr($time, 2);

            require './model/dieuBietOn/mDieuBietOn.php';
            $mDieuBietOn = new mDieuBietOn();
            $result = $mDieuBietOn->getDBOOfMonth($month, $year, $maND);
            $arr = $mDieuBietOn->getTimeDBO($maND);
            $option = [];

            while($item = mysqli_fetch_array($arr))
            {
                $option[] = $item['thoiGian'];
            }

            require 'view/dieuBietOn/vDieuBietOn.php';
        }

        public function getDBO($maND)
        {
            $maDBO = $_GET['maDBO'];
            require './model/dieuBietOn/mDieuBietOn.php';
            $mDieuBietOn = new mDieuBietOn();
            $result = $mDieuBietOn->getDescDBO($maDBO, $maND);
            $result = mysqli_fetch_array($result);
            require './view/dieuBietOn/vChitietDBO.php';
        }

        public function createDBO($maND)
        {
            require './view/dieuBietOn/vCreateDBO.php';
        }
    }
?>