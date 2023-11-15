<?php
    class cMucTieuThang
    {
        public function index($maND)
        {
            require './model/mucTieuThang/mMucTieuThang.php';
            $mMTT = new mMucTieuThang();
            
            $result = $mMTT->getMucTieuThang($maND);       
            
            $listMTT = [];
            while ($chiTietMTT = mysqli_fetch_array($result))
            {
                $listMTT[] = $chiTietMTT['noiDung'];
                $chuDeThang = $chiTietMTT['chuDe'];
            }
            
            require './view/mucTieuThang/vMucTieuThang.php';
        }
    }
?>