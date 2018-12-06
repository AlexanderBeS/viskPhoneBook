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
        $parts = explode('/', $uri['path']);

        if(!empty($parts)) {
            if (isset($this->uri_array[$parts[1]])) {
                //разбивка значения из routes на массив 1 элемент которого - название Controller'a, а 2-ой - Action.
                $this->uri_array[$parts[1]] = explode('/', $this->uri_array[$parts[1]]);

                if (file_exists($controllers_dir . $this->uri_array[$parts[1]][0] . 'Controller.php')) {
                    //подключение определенного контроллера
                    require $controllers_dir . $this->uri_array[$parts[1]][0] . 'Controller.php';
                    $controllerName = $this->uri_array[$parts[1]][0] . 'Controller';
                    $controller = new $controllerName;

                    //запуск определенного Action
                    if (isset($this->uri_array[$parts[1]][1], $controller)){
                        $actionName = $this->uri_array[$parts[1]][1] . 'Action';
                        if (method_exists($controller, $actionName))
                            $controller->$actionName();
                    }

                    //проверка залогинился ли пользователь, в первых 2 случаях - доступ разрещен, в последнем - запрещен
                    if (($controller->publicSuccess)){
                        return $controller;
                    } elseif (isset($_SESSION['uId'])) {
                        return $controller;
                    } else {
                        $this->redirect('authorization');
                    }
                }
            }
        }
    }
}