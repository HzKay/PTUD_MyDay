<?php
    class cSuKien
    {   
        public function saveSuKien()
        {
            $maND = $_SESSION['userID'];
            $eventName = $_REQUEST['txtTitle'];
            $eventDate = $_REQUEST['txtTime'];
            require_once './model/suKien/mSuKien.php';
            $mSuKien = new mSuKien();
            $status = $mSuKien->insertEvent($eventName, $eventDate,$maND);

            header('location: ./');
        }
    }
?>