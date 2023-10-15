<div class="box-DBO">
    <div class="title-DBO">
        <span>
            Điều tôi biết ơn mỗi ngày
        </span>
    </div>
    <div class="content-DBO">
        <ul class="list-DBO">
            <?php
                foreach ($result as $item)
                {
                    echo '<li class="item-DBO"><span class="descri-DBO">'.$item['noiDung'].'</span></li>';
                }
            ?>
        </ul>
    </div>
</div>