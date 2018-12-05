<?php

class Router extends BaseController
{
    public $uri_array;

    public function __construct()
    {
        //спросить тут ли стартовать сессию
        session_start();
        $this->uri_array = include('config/routes.php');
    }

    public function run()
    {
        $controllers_dir = 'controllers/';
        $uri = parse_url($_SERVER['REQUEST_URI']);
        $parts = explode('/',$uri['path']);

        if(!empty($parts)) {
            if (isset($this->uri_array[$parts[1]])) {
                if (file_exists($controllers_dir . $this->uri_array[$parts[1]] . 'Controller.php')) {
                    require $controllers_dir . $this->uri_array[$parts[1]] . 'Controller.php';
                    $controllerName = $this->uri_array[$parts[1]] . 'Controller';
                    //проверка залогинился ли пользователь

                    $controller = new $controllerName;

                    var_dump($controller->publicSuccess);

                    if (($controller->publicSuccess)){
                        echo 'ДОСТУП РАЗРЕШЕНО';
                        return $controller;
                    } elseif (isset($_SESSION['uId'])) {
                        echo 'ДОСТУП РАЗРЕШЕНО';
                        return $controller;
                    } else {
                        echo 'ДОСТУП ЗАПРЕЩЕНО!';
                        $this->redirect('authorization');
                       }
                }
            }
        }
    }
}