<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 03.12.2018
 * Time: 0:01
 */

class Authorization extends Database
{
    public $userLogin;
    public $userPass;
    public $loginError;

    public function __construct()
    {
        parent::__construct();
        $this->loginError = false;
    }

    public function getAuthInfo()
    {
        $this->userLogin = trim(htmlspecialchars($_POST['login']));
        $this->userPass = trim(htmlspecialchars($_POST['password']));
    }

    public function checkAuthInfo()
    {
        if (($_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_POST['btn_auth']))) {
            $tblName = 'users';
            $this->getAuthInfo();
            $query = "SELECT id FROM $tblName WHERE login='$this->userLogin' and pass='$this->userPass' LIMIT 1";
            $uId = $this->result($this->query($query));

            if ($uId)
            {
                $_SESSION['uId'] = $uId['id'];
                return $uId;
            } else {
                $this->loginError = 'Wrong login of password!';
                unset($_SESSION['uId']);
                return false;
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['uId'])){
            //unset($_SESSION['uId']);
            session_destroy();
        }
    }
}