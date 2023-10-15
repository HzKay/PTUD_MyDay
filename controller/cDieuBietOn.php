<?php
    include "./modal/mDieuBietOn.php";

    $userID = "ND00002";
    $sql = "SELECT * FROM dieuBietOn WHERE maND = '{$userID}'";

    $mDieuBietOn = new mDieuBietOn();
    $result = $mDieuBietOn->getAllDBO($sql);
    
    include "./view/vDieuBietOn.php";
?>