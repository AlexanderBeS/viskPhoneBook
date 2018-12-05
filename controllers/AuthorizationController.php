<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 02.12.2018
 * Time: 23:39
 */

class AuthorizationController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $auth = new Authorization();
        $this->publicSuccess = true;
        //Если получили массив пользователя
        if ($auth->checkAuthInfo()){
            //var_dump($this->publicSuccess);
            //var_dump($this->publicSuccess);
            $this->redirect('mycontact');
        } else {
            $this->renderViews('authorization.php', array('loginError' => $auth->loginError,));
        }
    }

    public function actionLogin()
    {

    }

    public function actionLogout()
    {

    }
}