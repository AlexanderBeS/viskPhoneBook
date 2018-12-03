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
        $this->renderViews('authorization.html');
    }
}