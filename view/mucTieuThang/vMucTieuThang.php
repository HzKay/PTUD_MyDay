<?php
    define("PAGETITLE", 'Xem mục tiêu tháng');
    include_once "./view/navbar/vHeader.php";
    include_once "./view/navbar/vNavbar.php";
?>
    <div class="mtt-box w-75 mx-auto mt-5">
        <div class="box">
            <div class="chuDeThang text-center mb-5">
                <div class="mt-4 mb-3 position-relative">
                    <h3 class="fw-bold me-3">Chủ đề tháng</h3>
                    <form action="" method="post" class="position-absolute end-0 top-0 d-flex justify-content-center">
                        <select name="timeSelect" id="timeSelect" class="form-select" style="max-width: 160px;">
                            <option value="0">Chọn thời gian</option>
                            <?php
                                while($option = mysqli_fetch_array($optionList))
                                {
                                    if($timeSelect == $option['thangNam'])
                                    {
                                        echo "
                                            <option value='{$option['thangNam']}-01' selected>
                                            {$option['thangNam']}
                                            </option>
                                        ";
                                    }
                                    else
                                    {
                                        echo "
                                            <option value='{$option['thangNam']}-01'>
                                            {$option['thangNam']}
                                            </option>
                                        ";
                                    }
                                }
                            ?> 
                        </select>
                    </form>
                </div>
                <?php echo '<h5 class="mb-4">'.$chuDeThang.'</h5>';?>
            </div>
            <div class="mucTieuThang text-center mt-5">
                <h4 class="fw-bold d-3 mb-3">Mục tiêu tháng</h4>
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
    <script>
        var timeSelect = document.getElementById('timeSelect');
        timeSelect.addEventListener('change', function() {
            let value = timeSelect.value;
            if(value != 0)
            {
                let link = './?controller=mucTieuThang&action=index&time=' + value;
                window.location.href = link;
            }
        })
    </script>
<?php
    include_once "./view/navbar/vFooter.php";
?>
