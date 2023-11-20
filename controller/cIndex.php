<?php
    class indexController
    {
        public function vIndex ()
        {
            require_once './model/suKien/mSuKien.php';
            require_once './model/viecQuanTrong/mViecQuanTrong.php';
            
            $maND = $_SESSION['userID'];
            $mViecQuanTrong = new mViecQuanTrong();
            $mSuKien = new mSuKien();

            $today = date('Y-m-d');
            $result = $mSuKien->getEventList($maND);
            $jobList = $mViecQuanTrong->getJobList($today, $maND);
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