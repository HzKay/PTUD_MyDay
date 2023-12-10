<?php 
    define("PAGETITLE", 'Biểu đồ thói quen');
    include_once './view/navbar/vHeader.php';
?>
    <style>
        /* Tùy chỉnh kiểu CSS cho khoảng cách giữa các hàng */
        .custom-margin {
            margin-bottom: 20px;
        }

        /* Tùy chỉnh kiểu CSS cho khoảng cách giữa các radio */
        .custom-radio-margin {
            margin-right: 10px;
        }

        .custom-input-margin{
            margin-right: 10px;
        }

        .custom-radio-margin {
            margin-right: 10px;
        }
        
        h2{
            text-align: center;
            margin-bottom: 20px;
        }

        .date{
            margin-right: 60px;
        }
        .height_row {
            height: 20px;
        }
        .vissible {
            color: transparent;
        }
        .habit-box {
            width: 90%;
        }
        .habit-input {
            height: 33px;
            width: 20px;
        }
    </style>

<?php
    include_once './view/navbar/vNavbar.php';
?>
<div class="habit-box mx-auto">
    <div class="row mt-5 mb-3 text-center">
        <h3 class="col-8 text-end fw-bold">Những thói quen tôi muốn có</h3>
        <form action="" method="post" class="col-4 d-flex justify-content-center">
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
    <div class="row">
        <!-- Bên trái -->
        <div class="col-12">
            <?php
                if ($isHabit > 0) {
                    $dem = 0;
                    echo "<table class='table'>
                    <thead>";
                    echo "<th colspan='' class='vissible'>ô nhập nội dung</th>
                    <th colspan='' class='vissible'>ô nhập nội dung</th>";
                    for($day = 1; $day <= $lastDayOfMonth; $day++)
                    {
                        echo "<th clas='text-center'>{$day}</th>";
                    }
                    echo "</thead>
                    <tbody>
                    ";
                    if ($numHabit > 0) {
                        for($i=0; $i < $numHabit; $i++)
                        {
                            echo "<tr class='height_row'>";
                            echo "<td colspan='2'>{$habitList[$i]}</td>";
                            for ($day = 1; $day <= $lastDayOfMonth; $day++)
                            {
                                if($day == 21 || in_array($day, $status[$i]))
                                {
                                    echo '<td><input class="habit-input" type="checkbox" id="checkboxId' . $i . $day . '" name="checkbox' . ($i + 1) . '[]" value="' . $day . '" class="custom-radio-margin" onclick="saveCheckboxState(this)" checked disabled></td>';
                                } else
                                {
                                    echo '<td><input class="habit-input" type="checkbox" id="checkboxId' . $i . $day . '" name="checkbox' . ($i + 1) . '[]" value="' . $day . '" class="custom-radio-margin" onclick="saveCheckboxState(this)" disabled></td>';
                                }
                            }
                            echo "</tr>";
                        }
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<h4 class='text-center'>Không có dữ liệu thói quen</h4>";
                }
            ?>
        </div>
    </div>
</div>  
        <script>
        var timeSelect = document.getElementById("timeSelect");
        timeSelect.addEventListener('change', function (){
            let selectedValue = timeSelect.value;
            if(selectedValue != 0)
            {
                let link = './?controller=thoiQuen&thoiGian=' + selectedValue;
                window.location.href = link;
            }
        })
        document.addEventListener("DOMContentLoaded", function () {
            // Hàm để lưu trạng thái của checkbox vào localStorage
            function saveCheckboxState(checkbox) {
                localStorage.setItem(checkbox.id, checkbox.checked);
            }

            // Lắng nghe sự kiện click của checkbox
            document.addEventListener("click", function (event) {
                if (event.target.type === "checkbox") {
                    saveCheckboxState(event.target);
                }
            });

            // Khôi phục trạng thái checkbox từ localStorage
            for (let i = 0; i < 8; i++) {
                for (let j = 1; j <= 31; j++) {
                    const checkbox = document.getElementById('checkboxId' + i + j);
                    const isChecked = localStorage.getItem(checkbox.id);

                    if (isChecked === 'true') {
                        checkbox.checked = true;
                    }
                }
            }
        });
    </script>
    </div> 
<?php 
    include_once './view/navbar/vFooter.php';
?>