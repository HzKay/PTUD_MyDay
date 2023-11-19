<?php
    class cLogin
    {
        public function viewLoginForm()
        {
            require './view/login/vLogin.php';
        }

        public function viewRegisForm()
        {
            require './view/login/vRegis.php';
        }

        public function viewForgetForm()
        {
            require './view/login/vForget.php';
        }

        public function login()
        {
            require_once './model/login/mLogin.php';
            $mLogin = new mLogin();
            $username = $_POST['txtUsername'];
            $password = $_POST['txtMatKhau'];
            $pass_encrypt = md5($password);
            $result = $mLogin->login($username, $pass_encrypt);

            $isValidate = mysqli_num_rows($result);
            if($isValidate == 1)
            {
                $user = mysqli_fetch_array($result);
                $_SESSION['userID'] = $user['maND'];
                $_SESSION['password'] = $user['matKhau'];
                $_SESSION['username'] = $user['email'] ?? $user['sdt'];
                header('location: ./?controller=index');
            } else {
                $_SESSION['statusLogin'] = "Lỗi, Sai username hoặc password";
                header('location: ./?controller=login&action=index');
            }
        }

        public function register()
        {
            $password = md5($_REQUEST['txtMatKhau']);
            $ho = $_REQUEST['txtHo'];
            $ten = $_REQUEST['txtTen'];
            $email = $_REQUEST['txtEmail'];
            $sdt = $_REQUEST['txtSdt'];

            require_once './model/login/mLogin.php';
            $mLogin = new mLogin();
            $status = $mLogin->regisUser($password, $ho, $ten, $email, $sdt);

            if($status == 1)
            {
                header('location: ./?controller=login&action=index');
            } else {
                $_SESSION['statusRegis'] = 'Lỗi, đăng ký tài khoản không thành công';
            }
        }

        public function logout()
        {
            session_unset();
            session_destroy();
            header('location: ./?controller=login&action=index');
        }

        public function authenUser($maND, $username, $password)
        {
            require_once './model/login/mLogin.php';
            $mLogin = new mLogin();
            $result = $mLogin->getUserData($maND, $username, $password);
            $numRow = mysqli_num_rows($result);
            
            if($numRow == 1)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        public function forgetPass()
        {
            $username = $_POST['txtUsername'];
            $password = md5($_POST['txtNewPass']);

            require_once './model/login/mLogin.php';
            $mLogin = new mLogin();
            $result = $mLogin->resetPass($username, $password);

            if($result == 1)
            {
                header('location: ./?controller=login&action=index');
            }
            else
            {
                $_SESSION['statusForget'] = 'Đặt lại mật khẩu không thành công';
            }
        }
    }
?>