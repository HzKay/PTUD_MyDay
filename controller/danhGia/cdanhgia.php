<?php
include_once("./model/danhGia/mdanhgia.php");

class controldanhgia{
    function getAlldanhgia($maND){
        $p = new modeldanhgia();
            
        $tbldanhgia = $p->SelectAlldanhgia($maND);
        return $tbldanhgia;
    }
    function luu($trang,$ghi,$ma, $maND){
        $p = new modeldanhgia();
        $kqInsert = $p -> luu($trang, $ghi,$ma, $maND);
        return $kqInsert; // True thành công , false ko thành công
    }
    
}
?>