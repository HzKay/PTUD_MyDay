<?php
    class cMucTieuThang
    {
        public function index($maND)
        {
            require_once './model/mucTieuThang/mMucTieuThang.php';
            $mMTT = new mMucTieuThang();
            
            $result = $mMTT->getMucTieuThang($maND);       
            
            $listMTT = [];
            $chuDeThang = 'Chưa thiết lập';
            while ($chiTietMTT = mysqli_fetch_array($result))
            {
                $listMTT[] = $chiTietMTT['noiDung'];
                $chuDeThang = $chiTietMTT['chuDe'];
            }
            
            require_once './view/mucTieuThang/vMucTieuThang.php';
        }
    }
?>