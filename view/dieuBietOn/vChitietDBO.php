<?php
    include './view/navbar/vHeader.php';
 ?>   

<div class="position-relative vw-100 vh-100">
    <div class="position-absolute top-0  bg-dark w-100 h-100 opacity-75"></div>
    <div class="position-absolute rounded top-50 bg-light p-2 start-50 h-50 translate-middle" style="width: 30%">
        <div class="header-desc text-end position-relative border-bottom">
            <h3 class="text-center">Điều biết ơn</h3>
            <a href="?controller=dieuBietOn&action=index&time=<?php echo $_REQUEST['time']?>" class="position-absolute close-btn btn btn-light pe-3">&times;</a>
        </div>
        <div class="content-dbo mt-3">
            <?php
                echo "<span class='text-black-50'>{$result['thoiGian']}</span>";
                echo "<h3 class='mt-2 descDBO'>{$result['noiDung']}</h3>";
            ?>
        </div>
    </div>
</div>

<?php
    include './view/navbar/vFooter.php';
?>
