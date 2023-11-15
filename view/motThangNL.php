<?php
    include_once '../model/connect.php';
    $p = new connectDB();
    $conn = $p->connect();
    $select = mysqli_query($conn,"SELECT YEAR(`thangNam`) as `year` from `motThangNhinLai` WHERE `maND` = '1'") or die("123");
    $data=array();
    while ($row = mysqli_fetch_assoc($select)) {
        array_push($data, $row['year']);

        $new =  array_unique($data);
        
    }
    // echo var_dump($new);
    // $row = mysqli_fetch_assoc($select);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<style>
    tbody{
        border-color: black;
    }
    body{
        overflow: hidden;
    }
    .container{
        max-width: 1280px;
        height: 100%;
    }
    #form1{
        height: 470px;
    }
    .form-control{
        border: 1px solid black;
    }
    table{
        width: 95%;
        margin: auto;
    }
    table td{
        font-weight: bold;
        border-width: 2px;
    }
    table thead{
        height: 40px;
    }
    section{
        font-weight: bold;
    }
    select{
    border: 2px solid black;
    background-color: #aacde1;
    font-weight: bold;
    width: 110px;
    height: 40px;
    }
    button{
        border: none;
        background: none;
        font-weight: bold;
    }
    p{
        margin-top: 20px;
        margin-bottom: 0px;
    }
    td:hover{
        transform: scale(1.2);
        cursor: pointer;
    }
    .box-mtnl {
        display: flex;
         justify-content: center;
    }
    #form1 {
        display: flex;
    }
</style>
<body>
    <div class="box-mtnl">
        <main class="container mx-auto">
        <h4 style="text-align: center; margin-bottom: 30px; margin-top:26px">Xem một tháng nhìn lại</h4>
        <form class="row" class="" method="post" style="text-align: center; border-top: 2px solid black;" id="form1">
                <section class="col-sm-7" style="border-right:2px solid black; padding-top: 20px;">
                    <div style="margin-bottom: 10px;" >Chọn tháng bạn muốn xem</div>
                        <table border="2" style="border-color: #076c6c;" >
                        <thead>
                            <th colspan="4">
                                <select name="" id="select1">
                                    <?php
                                        foreach($new as $key=>$value){
                                            // array_unique($data);
                                            echo "<option value='".$value."' selected> Năm ".$value."</option>"; 
                                        }
                                            
                                    ?>
                                </select>
                            </th>
                        </thead>
                        <tbody style="text-align: center; height: 300px; background-color: #aacde1;">
                            <tr>
                                <td><button type="button" class="btn_submit" value="1">Tháng 1  </button></td>
                                <td><button type="button" class="btn_submit" value="2">Tháng 2</button></td>
                                <td><button type="button" class="btn_submit" value="3">Tháng 3</button></td>
                                <td><button type="button" class="btn_submit" value="4">Tháng 4</button></td>
                            </tr>
                            <tr>
                                <td><button type="button" class="btn_submit" value="5">Tháng 5</button></td>
                                <td><button type="button" class="btn_submit" value="6">Tháng 6</button></td>
                                <td><button type="button" class="btn_submit" value="7">Tháng 7</button></td>
                                <td><button type="button" class="btn_submit" value="8">Tháng 8</button></td>
                            </tr>
                            <tr>
                                <td><button type="button" class="btn_submit" value="9">Tháng 9</button></td>
                                <td><button type="button" class="btn_submit" value="10">Tháng 10</button></td>
                                <td><button type="button" class="btn_submit" value="11">Tháng 11</button></td>
                                <td><button type="button" class="btn_submit" value="12">Tháng 12</button></td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <section class="col-sm-5 d-flex flex-column align-items-center" style="gap: 10px; padding-top: 20px;" action="" method="post">
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
                    <script>
                    document.getElementById("submit").addEventListener("click",(e)=>{
                        // window.location.href = ""
                    })
                    </script>
                    
                </section>
        </form>
    </div>

</main>

<script src="./bootstrap-5.0.2-dist/js/bootstrap.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./bootstrap-5.0.2-dist/js/bootstrap-bundle.min.js"></script>
<script src="./js/jquery-3.6.1.min.js"></script>
<script src="./js/jquery.animateNumber.min.js"></script>
<script src="./js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/xem.js"></script>
</body>
</html>