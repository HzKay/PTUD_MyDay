<?php
include "connect.php";

$p=new connectDB();
$con=$p->connect();  

$sql = "SELECT giaTri FROM camXuc WHERE maND = '1'";
$result = mysqli_query($con, $sql);

// Khởi tạo mảng để lưu trữ giá trị cảm xúc
$emotionValues = array();

// Đọc dữ liệu từ kết quả truy vấn
while ($row = mysqli_fetch_assoc($result)) {
    $emotionValues[] = $row['giaTri'];
}

// Xác định số lượng phần tử cần lấy (lấy ngày từ hàm date)
$numberOfDays = intval(date('d'));

// Lấy số ngày cuối cùng từ mảng $emotionValues
$recentEmotionValues = array_slice($emotionValues, -$numberOfDays);

// Định nghĩa giá trị của các cảm xúc
$emotionMapping = array(
    'vui' => 4,
    'buon' => 2,
    'gian_du' => 1,
    'hanh_phuc' => 5,
    'binh_thuong' => 3,
);

// Kiểm tra xem có dữ liệu cảm xúc hay không
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

// Hiển thị kết quả (có thể thực hiện vẽ biểu đồ ở đây)
echo "Dữ liệu cảm xúc: " . implode(', ', $recentEmotionValues) . "<br>";

include'chart.php';
?>