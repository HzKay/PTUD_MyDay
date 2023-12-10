<?php
// include_once("./model/camXuc/mbieudocamxuc.php");
include_once("./model/camXuc/mbieudocamxuc.php");

class controlbieudocamxuc{
    function getSumOfEmotionValues($maND){
        $p = new modelbieudocamxuc();
        $total = $p->SelectAllbieudocamxuc($maND);
        return $total;
    }
   
    function getRandomAdvice($emotionScore){
        $nhom = 0;
        if($emotionScore <= 50){
            $nhom = 2;
        } else if($emotionScore <= 100){
            $nhom = 3;
        } else {
            $nhom = 1;
        }
        
        $mCamXuc = new modelbieudocamxuc();
        $table = $mCamXuc->getAllIDCTVan($nhom);
        
        $rows = [];
        while($row = mysqli_fetch_array($table)){
            $rows[] = $row;
        }
        $max = mysqli_num_rows($table)-1;
        $id = rand(0, $max);
        return $rows[$id];
    }

    function getAdvice($maCTV){
        $mCamXuc = new modelbieudocamxuc();
        $table = $mCamXuc->getCTVan($maCTV);
        $row = mysqli_fetch_array($table);
        
        return $row;
    }

    function checkAdvice($thang, $nam, $maND){
        $mCamXuc = new modelbieudocamxuc();
        $table = $mCamXuc->checkAdvice($thang, $nam, $maND);
        $numRow = mysqli_num_rows($table);
        
        if($numRow > 0)
        {
            $row = mysqli_fetch_array($table);
            return $row['maCTV'];
        }
        
        return 0;
    }

    function saveAdviceOfUser($maCTV, $maND){
        $mCamXuc = new modelbieudocamxuc();
        $result = $mCamXuc->saveAdvice($maCTV, $maND);
        
        return $result;
    }

    function getAllMonthForSelect($maND)
    {
        $mCamXuc = new modelbieudocamxuc();
        $dsThang = $mCamXuc->getAllMonth($maND);
        $option = [];

        while($item = mysqli_fetch_array($dsThang))
        {
            $option[] = $item['thoiGian'];
        }

        return $option;
    }

    function veBieuDoCamXuc($maND)
    {
        $thang = isset($_REQUEST['month']) ? $_REQUEST['month'] : date('m');
        $nam = isset($_REQUEST['year']) ? $_REQUEST['year'] : date('Y');
        $time = date("mY", strtotime("$nam-$thang-01"));
        $mCamXuc = new modelbieudocamxuc();
        $camXucThang = $mCamXuc->getCamXucOfMonth($maND, $thang, $nam);
        $option = $this->getAllMonthForSelect($maND);
        $emotionValues = [];
        while ($row = mysqli_fetch_array($camXucThang)) {
            $emotionValues[] = $row['giaTri'];
        }

        $numberOfDays = date('t');
        $recentEmotionValues = array_slice($emotionValues, -$numberOfDays);
        $emotionMapping = array(
            'vui' => 4,
            'buon' => 2,
            'gian_du' => 1,
            'hanh_phuc' => 5,
            'binh_thuong' => 3,
        );
        if (!empty($emotionValues)) {
            // Tính toán độ lên xuống cho mỗi cảm xúc
            $emotionLevels = array_map(function ($value) use ($emotionMapping) {
                // Kiểm tra xem key có tồn tại trong mảng $emotionMapping hay không
                return isset($emotionMapping[$value]) ? $emotionMapping[$value] : null;
            }, $emotionValues);
        
            // Loại bỏ các giá trị null từ mảng $emotionLevels
            $emotionLevels = array_filter($emotionLevels, function ($value) {
                return $value !== null;
            });
        
            // Chuyển đổi mảng $emotionLevels thành chuỗi JSON và đặt trong biến JavaScript
            $emotionLevelsJson = json_encode($recentEmotionValues);
        } else {
            $emotionLevelsJson = '[]'; // Nếu không có dữ liệu cảm xúc, truyền một mảng rỗng
        }
        include'./view/camXuc/chart.php';
    }

    function getViewNhapCamXuc()
    {
        require_once './view/camXuc/vNhapCamXuc.php';
    }

    function saveEmotion()
    {
        $maND = $_SESSION['userID'];
        $camXuc = $_REQUEST['emotion'][0];

        $mBieuDoCX = new modelbieudocamxuc();
        $status = $mBieuDoCX->saveEmotion($camXuc, $maND);

        if($status == 1)
        {
            echo "<script>alert('Lưu cảm xúc thành công!')</script>";
            header('location: index.php?controller=dieuBietOn&action=create');
        } else
        {
            echo "<script>alert('Lỗi, lưu cảm xúc không thành công!')</script>";
        }
    }
}
?>
