<?php
include_once("./controller/camXuc/cbieudocamxuc.php");

class viewbieudocamxuc{
    function viewAllbieudocamxuc($maND){
        $cBieuDo = new controlbieudocamxuc();
        $total = $cBieuDo->getSumOfEmotionValues($maND)->fetch_assoc()['total'];
        if ($total !== null) {
            
            $advice = $cBieuDo->getRandomAdvice($total);
            echo "<h2 class='text-center'>Lời khuyên cho bạn</h2>";
            echo "<div style='border:1px solid black; padding:10px; width:50%;height:100px; margin:0 auto 60px auto; display:table;'>";
            echo $advice['noiDung'];
            echo "</div>";
        } else {
            echo "Không có dữ liệu";
        }
    }

    function hienBieuDo($maND)
    {        
        $cBieuDo = new controlbieudocamxuc();
        $result = $cBieuDo->veBieuDoCamXuc($maND);
    }
}
?>