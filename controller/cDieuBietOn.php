<?php
    class cDieuBietOn
    {
        public function index($maND)
        {
            $time = $_REQUEST['time']?? date('mY');
            $month = substr($time, 0, 2);
            $year = substr($time, 2);

            require './model/mDieuBietOn.php';
            $mDieuBietOn = new mDieuBietOn();
            $result = $mDieuBietOn->getDBOOfMonth($month, $year, $maND);
            $arr = $mDieuBietOn->getTimeDBO($maND);
            $option = [];

            while($item = mysqli_fetch_array($arr))
            {
                $option[] = $item['thoiGian'];
            }

            require 'view/vDieuBietOn.php';
        }

        public function chiTietDBO()
        {
            require "./view/vChitietDBO.php";
        }
    }
?>