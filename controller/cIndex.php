<?php
    class indexController
    {
        public function vIndex ()
        {
            $maND = $_SESSION['userID'];
            require_once './model/index/mIndex.php';
            $mIndex = new mIndex();
            $result = $mIndex->getEventList($maND);

            $events = [];
            
            while ($content = mysqli_fetch_array($result))
            {
                $temp = ['title'=>$content['suKien'],'start'=>$content['thoiGian'],'color'=> '#007bff'];
                $events[] = $temp;
            }
            $events = json_encode($events);

            require_once './view/vIndex.php';
        }
    }
?>