<?php
 class connectDB 
 {
    // private $servername = "localhost";
    private $servername = "82.180.152.153";
    private $database = "u420857906_So_MyDay";
    private $username = "u420857906_admin";
    private $password = "taikhoAnMyD4y@gmail.%$";
    
    public function connect() 
    {
        // Tạo kết nối đến csdl
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //mysql_query('SET NAMES UTF8');
        return $conn;
    }

    public function excuteQuery ($sql)
    {
        $conn = $this->connect();

        $isSuccess = $conn->query($sql);
        if($isSuccess)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function closeConnect($conn)
    {
        mysqli_close($conn);
    }
 }
?>