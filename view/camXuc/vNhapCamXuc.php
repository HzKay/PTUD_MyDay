<?php
    define("PAGETITLE", 'Nhập một tháng nhìn lại');
    include './view/navbar/vHeader.php';
    echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">';
    echo '<link rel="stylesheet" href="./css/demo.css">';
    echo '<script src="./js/changecolor.js"></script>';
    include './view/navbar/vNavbar.php';
?>
<div class="container">
<form action="" id="emotionForm" method="get">
    <input type="text" name="controller" value="camXuc" hidden id="">
    <input type="text" name="action" value="insert" id="" hidden>
    <div class="row">
        <div class="col-12 d-flex justify-content-center flex-column text-center mt-5" style="height: 100px;">
                    <div class="emotion-box mt-5">
                        
                        <label for="emotion1" class="color-change-btn" name="emoValue4" value="4" onclick="changeColor(0)" type="button" class="btn btn-outline-secondary">
                            <i class="bi bi-emoji-angry" style="font-size: 50px;"></i>
                        </label>
                        <input type="radio" hidden value="1" name="emotion[]" id="emotion1">

                        <label for="emotion2" class="color-change-btn" name="emoValue2" value="2" onclick="changeColor(1)" type="button" class="btn btn-outline-secondary">
                            <i class="bi bi-emoji-frown" style="font-size: 50px;" ></i>
                        </label>
                        <input type="radio" hidden value="2" name="emotion[]" id="emotion2">

                        
                        <label for="emotion3" class="color-change-btn" name="emoValue5" value="5" onclick="changeColor(2)" type="button" class="btn btn-outline-secondary">
                            <i class="bi bi-emoji-neutral" style="font-size: 50px;"></i>
                        </label>
                        <input type="radio" hidden value="3" name="emotion[]" id="emotion3">
                        
                        <label for="emotion4" class="color-change-btn" name="emoValue1" value="4" onclick="changeColor(3)" type="button" class="btn btn-outline-secondary">
                            <i class="bi bi-emoji-smile" style="font-size: 50px;"></i>
                        </label>
                        <input type="radio" hidden value="4" name="emotion[]" id="emotion4">

                        <label for="emotion5" class="color-change-btn" name="emoValue3" value="3" onclick="changeColor(4)" type="button" class="btn btn-outline-secondary">
                            <i class="bi bi-emoji-laughing" style="font-size: 50px;"></i>
                        </label>
                        <input type="radio" hidden value="5" name="emotion[]" id="emotion5">
                    </div>

                    <input type="submit" value="Lưu" class="btn btn-light w-25 mx-auto mt-5"> 
            </div>
        </div>
    </div>  
</form>               
</div>
<?php
    include './view/navbar/vFooter.php';
?>