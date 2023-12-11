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
            $time = $_REQUEST['time'] ?? date('Y-m-d');

            $result = $mSuKien->getEventList($maND);
            $jobList = $mViecQuanTrong->getJobList($time, $maND);
            $events = [];
            
            while ($content = mysqli_fetch_array($result))
            {
                $temp = ['title'=>$content['suKien'],'start'=>$content['thoiGian'],'color'=> '#007bff'];
                $events[] = $temp;
            }
            
            $events = json_encode($events);

            require_once './view/vIndex.php';
        }

        public function changeTime()
        {
            $time = strtotime($_REQUEST['time'] ?? date('Y-m-d'));
            $isBtnPrev = isset($_REQUEST['btnPrevJob']);
            $isBtnNext = isset($_REQUEST['btnNextJob']);

            if($isBtnPrev)
            {
                $timeSelect = date('Y-m-d', strtotime('-1 day', $time));
            }
            else if ($isBtnNext)
            {
                $timeSelect = date('Y-m-d', strtotime('+1 day', $time));
            }

            header("location: ./?controller=index&time={$timeSelect}");
        }
    }
?>