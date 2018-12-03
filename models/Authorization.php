<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 03.12.2018
 * Time: 0:01
 */

class Authorization
{
    public function checkData() {
        if (($_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_POST['auth_ok']))) {
            $user_login = trim(htmlspecialchars($_POST['login']));
            $user_pass = trim(htmlspecialchars($_POST['pass']));
        }
    }
}