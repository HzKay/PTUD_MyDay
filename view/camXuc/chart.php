<div class="d-flex justify-content-center flex-column text-center">
<h3 style="text-align: center;" class="mt-4 mb-2">Biểu đồ cảm xúc của tôi</h3>
<?php echo  "<p><strong>Ngày: </strong>".date ("d/m/Y"). "</p><br>";  ?>
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
</script>

</div>