<?php
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
            $nhom = 1;
        } else if($emotionScore <= 100){
            $nhom = 2;
        } else {
            $nhom = 3;
        }
        
        $mCamXuc = new modelbieudocamxuc();
        $table = $mCamXuc->getCTVan($nhom);
        
        $rows = [];
        while($row = mysqli_fetch_array($table)){
            $rows[] = $row;
        }
        
        return $rows[array_rand($rows)];
    }

    function veBieuDoCamXuc($maND)
    {
        $thang = date('m');
        $nam = date('Y');
        $mCamXuc = new modelbieudocamxuc();
        $camXucThang = $mCamXuc->getCamXucOfMonth($maND, $thang, $nam);
        
        $emotionValues = [];
        while ($row = mysqli_fetch_array($camXucThang)) {
            $emotionValues[] = $row['giaTri'];
        }

        $numberOfDays = $thang;
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
}


?>
