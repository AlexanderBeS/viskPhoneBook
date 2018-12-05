<?php

class BaseController {

    public $publicSuccess;

    public function __construct()
    {
        $this->publicSuccess = false;
    }

    public function redirect($destination)
    {
        return header("Location: /$destination");
    }

    public function renderViews($fileName = NULL, $viewVars = array())
    {
        $mainFile = '/views/index.php';
        if ($fileName) {
            $viewFile = '/views/' . "$fileName";
            ob_start();
            if (is_array($viewVars) && count($viewVars)) extract($viewVars);
            include ("$viewFile");
            $content = ob_get_contents();
            ob_clean();
        }
        include ("$mainFile");
    }

    /*public function checkUserAuth(){
        if (isset($_SESSION['uId'])){
            return true;
        } else {
            return false;
        }
    }*/
}