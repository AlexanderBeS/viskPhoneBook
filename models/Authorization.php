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

    public function getAuthInfo(){
        $this->userLogin = trim(htmlspecialchars($_POST['login']));
        $this->userPass = trim(htmlspecialchars($_POST['password']));
    }

    public function checkAuthInfo() {
        if (($_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_POST['btn_auth']))) {
            $tblName = 'users';
            $this->getAuthInfo();
            $query = "SELECT * FROM $tblName WHERE login='$this->userLogin' and pass='$this->userPass' LIMIT 1";
            $userInfo = $this->results($this->query($query));

            //Если получен массив пользователя, то возвращаем его
            if ($userInfo)
            {
                return $userInfo;
            } else {
                echo "КАК ВЫВЕСТИ ОШИБКУ КУДА НУЖНО??";
            }
        }
    }

}