<?php
    class cViecQuanTrong 
    {
        public function vCreateForm()
        {
            require_once './view/viecQuanTrong/vCreateCV.php';
        }

        public function saveJob()
        {
            require_once './model/viecQuanTrong/mViecQuanTrong.php';
            $mViecQuanTrong = new mViecQuanTrong();
            $maND = $_SESSION['userID'];
            $dsNoiDung = $_REQUEST['noiDung'];
            $dsThoiGian = $_REQUEST['thoiGianTH'];
            $ghiChu = $_REQUEST['ghiChu'];
            
            $result = $mViecQuanTrong->insertJob($dsNoiDung, $dsThoiGian, $maND, $ghiChu);
            if($result == 1)
            {
                header('location: ./?controller');
            }
            else
            {
                echo '<script>alert("Lưu không thành công");</script>';
                header('location: ./?controller=viecQuanTrong&action=create');
            }
        }
    }
?>