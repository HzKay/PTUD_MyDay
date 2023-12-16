<?php
    define('PAGETITLE', 'Đánh giá thói quen');
    include_once './view/navbar/vHeader.php';
    include_once './view/navbar/vNavbar.php';
?>
    <div class="container">
        <div style="width: 100%; height: 400px; margin-top: 60px;" class="text-center">
            <div class="mt-4 mb-4">
                <h3 class="fw-bold">Đánh giá thực hiện thói quen</h3>
            </div>
            <form action="./" method="get" class="w-50 mx-auto">
                <input type="text" name="controller" value="thoiQuen" hidden id="">
                <input type="text" name="action" value="insert" hidden id="" >
                <?php
                $id = 0;
                    while($habit = mysqli_fetch_array($habitList))
                    {
                        echo "
                        <div class='row align-items-center'>
                            <div class='col-3 text-end'>
                                <input type='checkbox' class=' w-50 h-50' name='today[]' value='{$id}' id='thoiQuen1'>
                            </div>
                            <div class='col-9'>
                                <input type='text' readonly class='bg-transparent border-0 form-control color-dark' name='noiDung[]' value='{$habit['noiDung']}' >
                            </div>
                        </div>";
                        $id++;
                    }
                ?>
                <br>
                <button type="submit" value="Lưu" class="btn btn-light border">Lưu</button>
            </form>
        </div>
    </div>
<?php
    include_once './view/navbar/vFooter.php';
?>