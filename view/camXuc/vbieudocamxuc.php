<?php
include_once("./controller/camXuc/cbieudocamxuc.php");

class viewbieudocamxuc{
    function viewAllbieudocamxuc($maND){
        $cBieuDo = new controlbieudocamxuc();
        $total = $cBieuDo->getSumOfEmotionValues($maND)->fetch_assoc()['total'];
    
        echo "<h2 class='text-center'>Lời khuyên cho bạn</h2>";
        echo "<div style='border:1px solid black; padding:10px; width:50%;height:100px; margin:0 auto 60px auto; display:table;'>";
        if ($total !== null) {
            $thang = isset($_REQUEST['month']) ? $_REQUEST['month']: date('m');
            $nam = isset($_REQUEST['year']) ? $_REQUEST['year']: date('Y');
            $lastDateOfMonth = date('t');
            $today = date('m');
            $isAdvice = $cBieuDo->checkAdvice($thang, $nam, $maND);

            if($isAdvice > 0) {
                $advice = $cBieuDo->getAdvice($isAdvice);
            }else if($today == $lastDateOfMonth)
            {
                $advice = $cBieuDo->getRandomAdvice($total);
                $cBieuDo->saveAdviceOfUser($advice['maCTV'], $maND);
            } 
            echo $advice['noiDung']??' ';
        } else {
            echo "Không có dữ liệu";
        }
        echo "</div>";
    }

    function hienBieuDo($maND)
    {        
        $cBieuDo = new controlbieudocamxuc();
        $result = $cBieuDo->veBieuDoCamXuc($maND);
    }
}
?>