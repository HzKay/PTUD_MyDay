 <?php
    include_once './view/navbar/vHeader.php';
    include_once './view/navbar/vNavbar.php';
    $now = isset($_GET['time']) ? $_GET['time'] : date('mY');
 ?>   

<div class="box">
    <div class="dbo-box">
        <div class="dbo-container">
            <form action="" class="form-dbo d-flex" method="get">
                <input name='controller' hidden value='dieuBietOn'>
                <input name='action' hidden value='index'>
                
                <?php
                    echo "<select class='form-select' name='time'>";
                    foreach ($option as $item)
                    {
                        $value = date('mY', strtotime($item));
                        $month = date('m-Y', strtotime($item));

                        if($time === $value)
                        {
                            echo "<option value='{$value}' selected>{$month}</option>";
                        } else
                        {
                            echo "<option value='{$value}'>{$month}</option>";
                        }
                    }
                    echo '</select>';
                ?>
                <button type="submit" class="date-btn border text-center btn btn-light">Search</button>
            </form>
            <div class="dbo-circle">
                <h3 class="circle-title">
                    Điều tôi biết ơn mỗi ngày
                </h3>
            </div>
            <ul class="dbo-list">
                <?php
                    $numDBO = mysqli_num_rows($result);
                    if($numDBO > 0 )
                    {
                        $id=0;
                        $angle = 360/$numDBO;
                        while ($row = mysqli_fetch_array($result))
                        {
                            $angleOfItem = $id * $angle;
                            $id++;
    
                            if($angleOfItem > 90 && $angleOfItem < 270)
                            {
                                echo "
                                <li class='dbo-item' style='transform: rotate({$angleOfItem}deg);' id='id-{$id}'>
                                    <a href='?controller=dieuBietOn&action=chiTietDBO&time={$now}&maDBO={$row['maDBO']}' class='dbo-decrise flip-dbo-item'>{$id}. {$row['noiDung']}</a>
                                </li>
                                ";
                            }
                            else
                            {
                                echo "
                                <li class='dbo-item' style='transform: rotate({$angleOfItem}deg);' id='id-{$id}'>
                                    <a href='?controller=dieuBietOn&action=chiTietDBO&time={$now}&maDBO={$row['maDBO']}' class='dbo-decrise'>{$id}. {$row['noiDung']}</a>
                                </li>
                                ";
                            }
                        }
                    } 
                ?>

            </ul>
        </div>
    </div>    
</div>
<?php
    include_once './view/navbar/vFooter.php';
?>
    