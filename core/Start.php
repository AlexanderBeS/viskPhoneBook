<?php

class Start
{
     static public function run()
     {
         //require_once 'modules/Sidebar.php';
         //require_once 'modules/Navigation.php';

         //$main = new MainController();

         $route = new Router();
         $route->run();
     }
}
