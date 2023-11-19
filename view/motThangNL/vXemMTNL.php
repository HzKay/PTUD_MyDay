<?php
define("PAGETITLE", 'Một tháng nhìn lại');
include_once './view/navbar/vHeader.php';

echo '<link rel="stylesheet" href="css/motThangNL.css">';
include_once './view/navbar/vNavbar.php';
?>
<main class="container">
     <h4 style="text-align: center; margin-bottom: 30px; margin-top:26px">Xem một tháng nhìn lại</h4>
    <form class="row" method="post" style="text-align: center; border-top: 2px solid black;" id="form1">
        <input type="text" name="maND" id="maND" value="<?php echo $_SESSION['userID']?>" hidden>
        <section class="col-sm-5" style="border-right:2px solid black; padding-top: 20px;">
            <div style="margin-bottom: 10px;" >Chọn tháng bạn muốn xem</div>
                <table border="2" style="border-color: #076c6c;" >
                <thead>
                    <th colspan="4">
                        <select name="" id="select1">
                            <?php
                                while ($row = mysqli_fetch_array($listYear))
                                {
                                    $year = $row['year'];
                                    echo "<option value='".$year."' selected> Năm ".$year."</option>"; 
                                }
                            ?>
                        </select>
                    </th>
                </thead>
                <tbody style="text-align: center; height: 300px; background-color: #aacde1;">
                    <tr>
                        <td class="fw-bold border-1"><button type="button" class="btn_submit" value="1">Tháng 1  </button></td>
                        <td class="fw-bold border-1"><button type="button" class="btn_submit" value="2">Tháng 2</button></td>
                        <td class="fw-bold border-1"><button type="button" class="btn_submit" value="3">Tháng 3</button></td>
                        <td class="fw-bold border-1"><button type="button" class="btn_submit" value="4">Tháng 4</button></td>
                    </tr>
                    <tr>
                        <td class="fw-bold border-1"><button type="button" class="btn_submit" value="5">Tháng 5</button></td>
                        <td class="fw-bold border-1"><button type="button" class="btn_submit" value="6">Tháng 6</button></td>
                        <td class="fw-bold border-1"><button type="button" class="btn_submit" value="7">Tháng 7</button></td>
                        <td class="fw-bold border-1"><button type="button" class="btn_submit" value="8">Tháng 8</button></td>
                    </tr>
                    <tr>
                        <td class="fw-bold border-1"><button type="button" class="btn_submit" value="9">Tháng 9</button></td>
                        <td class="fw-bold border-1"><button type="button" class="btn_submit" value="10">Tháng 10</button></td>
                        <td class="fw-bold border-1"><button type="button" class="btn_submit" value="11">Tháng 11</button></td>
                        <td class="fw-bold border-1"><button type="button" class="btn_submit" value="12">Tháng 12</button></td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section class="col-sm-7 d-flex flex-column align-items-center" style="gap: 10px; padding-top: 20px;" action="" method="post">
            <label for="view1">
                Những điều bạn đã làm để THÂN khoẻ và đẹp.
            </label>
                <div type="view" name="view1" class="form-control" id="view1"  style="height: 80px; width: 340px;max-width: 500px; max-height: 100px; background-color:#aacde1;"></div>
            <label for="view2">
                Những điều bạn đã làm để nuôi dưỡng TÂM hồn.
            </label>
                <div type="view" name="view2" class="form-control" id="view2"  style="height: 80px; width: 340px;max-width: 500px; max-height: 100px; background-color:#aacde1;"></div>
            <label for="view3">
                Những điều bạn đã làm để phát triển TRÍ tuệ.
            </label>
                <div type="view" name="view3" class="form-control" id="view3"  style="height: 80px; width: 340px;max-width: 500px; max-height: 100px; background-color:#aacde1;"></div>
            <button id="submit" type="button" class="btn btn-dark" name="submit" style="margin: 10px 0 0 250px">Quay lại</button>
        </section>
    </form>
</main>

<?php

echo '
<script src="./js/jquery-3.6.1.min.js"></script>
<script src="./js/jquery.animateNumber.min.js"></script>
<script src="./js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/xem.js"></script>';

include_once './view/navbar/vFooter.php';
?>
