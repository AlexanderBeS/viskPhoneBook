<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 02.12.2018
 * Time: 23:39
 */

class AuthorizationController extends Core
{
    public function __construct()
    {
        $auth = new Authorization();

        //Если получили массив пользователя
        if ($auth->checkAuthInfo()) {
            //print_r ($auth->checkData());
            $this->renderViews('mycontact.php');
            //header('http://visk/mycontact');
            //Как тут грамотно перейти на новую ссылку?
            //если делать через header - не работает, если через render - ссылка не меняется

        } else {
            $this->renderViews('authorization.php');
        }
    }
}