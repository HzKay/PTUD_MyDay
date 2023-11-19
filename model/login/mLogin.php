<?php
    require_once './model/connect.php';

    class mLogin extends connectDB
    {
        public function getUserData($maND, $username, $password)
        {   
            $conn = $this->connect();
            $query = "SELECT * FROM nguoiDung WHERE `maND` = {$maND} AND (`email` = '{$username}' OR `sdt` = '{$username}') AND `matKhau` = '{$password}'; ";
            $result = mysqli_query($conn, $query);
            $this->closeConnect($conn);

            return $result;
        }

        public function login($username, $pass)
        {   
            $conn = $this->connect();
            $query = "SELECT * FROM nguoiDung WHERE (`email` = '{$username}' OR `sdt` = '{$username}') AND `matKhau` = '{$pass}'";
            $result = mysqli_query($conn, $query);
            $this->closeConnect($conn);

            return $result;
        }

        public function regisUser($pass, $ho, $ten, $email, $phone)
        {
            $conn = $this->connect();
            $query = "INSERT INTO `nguoiDung` (`matKhau`, `ho`, `ten`, `email`, `sdt`) 
                    VALUES ('{$pass}', '{$ho}', '{$ten}', '{$email}', '{$phone}');";
            $result = $this->excuteQuery($query);
            $this->closeConnect($conn);

            return $result;
        }

        public function resetPass($username, $password)
        {
            $conn = $this->connect();
            $query = "UPDATE `nguoiDung` SET `matKhau` = '{$password}' WHERE (`email` = '{$username}' OR `sdt` = '{$username}')";
            $result = $this->excuteQuery($query);
            $this->closeConnect($conn);

            return $result;
        }
    }
?>