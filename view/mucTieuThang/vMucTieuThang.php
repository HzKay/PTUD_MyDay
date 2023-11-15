<?php
    include_once "./view/navbar/vHeader.php";
    include_once "./view/navbar/vNavbar.php";
?>
    <div class="mtt-box w-75 mx-auto mt-5">
        <div class="box">
            <div class="chuDeThang text-center mb-5">
                <h3 class="mt-4 mb-3 fw-bold">Chủ đề tháng:</h3>
                <?php echo '<h5 class="mb-4">'.$chuDeThang.'</h5>';?>
            </div>
            <div class="mucTieuThang text-center mt-5">
                <h4 class="fw-bold d-3">Mục tiêu tháng</h4>
                <ul class="list-mtt" style="list-style:none;">
                    <?php
                        for ($i=0; $i < count($listMTT); $i++)
                        {
                            $index = $i+1;
                            echo "<li class=''><h5 class='mb-3'>{$index}. {$listMTT[$i]}</h5></li>";
                        }
                    ?>

                </ul>
            </div>
        </div>
    </div>
<?php
    include_once "./view/navbar/vFooter.php";
?>
