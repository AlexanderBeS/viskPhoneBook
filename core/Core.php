<?php

class Core {
    public function __construct()
    {

    }

    public function renderViews($fileName = NULL){
        $mainFile = '/views/index.php';

        if ($fileName) {
            $viewFile = '/views/' . "$fileName";
            ob_start();
            include ("$viewFile");
            $content = ob_get_contents();
            ob_clean();
        }

        include ("$mainFile");
    }
}