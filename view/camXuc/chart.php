<?php
define("PAGETITLE", 'Một tháng nhìn lại');
include_once './view/navbar/vHeader.php';
include_once './view/navbar/vNavbar.php';
?>
<div class="d-flex justify-content-center flex-column text-center">
<h3 style="text-align: center;" class="mt-4 mb-2">Biểu đồ cảm xúc của tôi</h3>
<div class="d-flex align-items-center justify-content-center mb-3">
    <p class="fw-bold mb-0 me-3">Tháng: </p>
    <form action="" style="width:120px" class=" d-flex" method="post">                
        <?php
            echo "<select id='time' class='form-select' name='time'>";
            foreach ($option as $item)
            {
                $value = date('mY', strtotime($item));
                $month = date('m/Y', strtotime($item));

                if($time == $value)
                {
                    echo "<option value='{$value}' selected>{$month}</option>";
                } else
                {
                    echo "<option value='{$value}'>{$month}</option>";
                }
            }
            echo '</select>';
        ?>
    </form>
</div>
<!-- Hiển thị nơi vẽ biểu đồ -->
<div class="box w-75 h-100 mx-auto">

    <canvas id="emotionChart"  style='width: 400px; height: 200px;'></canvas>
</div>

<script>
// Lấy dữ liệu từ PHP và chuyển thành biến JavaScript
var emotionLevelsJson = <?php echo $emotionLevelsJson; ?>;

// Thiết lập biểu đồ
var ctx = document.getElementById('emotionChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data: {
        datasets: [{
            label: 'Độ lên xuống của cảm xúc',
            borderColor: 'rgb(75, 192, 192)',
            backgroundColor: 'rgba(75, 192, 192, 0.5)',
            data: emotionLevelsJson.map((value, index) => ({ x: index + 1, y: value })),
        }]
    },
    options: {
        scales: {
            x: {
                beginAtZero: false,
                type: 'linear',
                position: 'bottom',
                min: 1, // giá trị tối thiểu trên trục x 
                stepSize: 1, 
                max: <?php echo $numberOfDays; ?>
            },
            y: {
                beginAtZero: false,
                min: 1,
                max: 6, // giá trị tối đa trên trục y 
                ticks: {
                    stepSize: 1, // Chỉ hiển thị giá trị nguyên từ 1 đến 5
                }
            }
        }
    }
});

var thangNam = document.getElementById("time");

thangNam.addEventListener("change", function() {    
    var selectedValue = thangNam.value;
    let thang = selectedValue.slice(0, 2);
    let nam = selectedValue.slice(2);
    let link = './?controller=camXuc&action=index&month=' + thang + '&year=' + nam;
    window.location.href = link;
});
</script>

</div>
<?php
include_once './view/navbar/vFooter.php';
?>