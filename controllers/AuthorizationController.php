<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 02.12.2018
 * Time: 23:39
 */

class AuthorizationController extends BaseController
{
    public $auth;

    public function __construct()
    {
        parent::__construct();
        $this->auth = new Authorization();
        $this->publicSuccess = true;
    }

    public function authAction()
    {
        //Если получили массив пользователя
        if ($this->auth->checkAuthInfo()){
            $this->redirect('mycontact');
        } else {
            $this->renderViews('authorization.php', array('loginError' => $this->auth->loginError,));
        }
    }

    public function logoutAction()
    {
        $this->auth->logout();
        //$this->renderViews('authorization.php');
        $this->redirect('authorization');
    }
}