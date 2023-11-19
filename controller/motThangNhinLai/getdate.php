<?php
$conn = mysqli_connect('82.180.152.153', 'u420857906_admin','taikhoAnMyD4y@gmail.%$', 'u420857906_So_MyDay') or die("áđá");
$data = [];
if(isset($_REQUEST['id']) && $_REQUEST['id'] !== ''){
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM `motThangNhinLai` WHERE `maND` = '1'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        array_push($data, $row);
    }
}   else {  
    $data = ["error" => "không có dữ liệu"];
}
}elseif(isset($_REQUEST["btn"]) && $_REQUEST["btn"] !== "" && isset($_REQUEST['nam']) && $_REQUEST['nam'] !== ''){
    $btn = $_REQUEST["btn"];
    $nam = $_REQUEST["nam"];
    $maND = $_REQUEST["maND"];
    $select = mysqli_query($conn,"SELECT * FROM `motThangNhinLai` WHERE MONTH(`thangNam`) = $btn AND YEAR(`thangNam`) = $nam AND `maND` = $maND");
    if(mysqli_num_rows($select) > 0){
        while($row = mysqli_fetch_assoc($select)){
            $data = ["date" => $row["thangNam"], "than" => $row["than"],"tam"=> $row["tam"],"tri"=> $row["tri"]];
        }
    }
}

else{
    $data = ["error"=> "get out!"];
}

echo json_encode($data);
?>