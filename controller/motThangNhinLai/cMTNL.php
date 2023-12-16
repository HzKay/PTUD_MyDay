<?php
    class cMotThangNL
    {
        public function viewCreteMTNL()
        {
            $today = date('m/Y');
            require './view/motThangNL/vTaoMTNL.php';
        }

        public function getDataOfYear()
        {
            $maND = 1;
            $month = $_POST['thang'] ?? date('m');
            $year = $_POST['nam'] ?? date('Y');
            $data = [];
            
            require '../../model/motThangNL/mMTNL.php';
            $mMotThangNL = new mMTNL();

            $result = $mMotThangNL->getDataOfYear($month, $year, $maND);
            $numRow = mysqli_num_rows($result);
            
            if($numRow > 0)
            {
                while ($row = mysqli_fetch_array($result))
                {
                    $data = ["date" => $row["thangNam"], "than" => $row["than"],"tam"=> $row["tam"],"tri"=> $row["tri"]];
                }
            } else {
                $data = ["error" => "không có dữ liệu"];
            }

            return $data;
        }

        public function viewMotThangNL()
        {
            $maND = $_SESSION['userID'];
            
            require './model/motThangNL/mMTNL.php';
            $mMotThangNL = new mMTNL();
            $listYear = $mMotThangNL->get_Year_From_DB($maND);
            require './view/motThangNL/vXemMTNL.php';
        }

        public function insertConTentMTNL()
        {
            $maND = $_SESSION['userID'];
            $than = $_POST['than'];
            $tam = $_POST['tam'];
            $tri = $_POST['tri'];
            $today = strtotime(date('Y-m-d'));
            $time = date('Y-m-d', strtotime('-1 month', $today));

            require './model/motThangNL/mMTNL.php';
            $mMotThangNL = new mMTNL();
            $status = $mMotThangNL->save_MTNL($than, $tam, $tri, $maND, $time);

            if($status == 1)
            {
                echo "<script>alert('Lưu nội dung thành công')</script>";
                header('location: ./index.php?controller=mucTieuThang&action=create');
            } else
            {
                echo "<script>alert('Lỗi, Không thể lưu nội dung')</script>";
            }
        }
    }
?>