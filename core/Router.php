<?php

class Router
{
    public $uri_array;

    public function __construct()
    {
        $this->uri_array = include('config/routes.php');
//print_r ($this->uri_array);
    }

    public function run()
    {
        $controllers_dir = 'controllers/';
        $uri = parse_url($_SERVER['REQUEST_URI']);
        $parts = explode('/',$uri['path']);
//print_r ($parts);

        if(!empty($parts)) {
            if (isset($this->uri_array[$parts[1]])) {
//print_r ($this->uri_array[$parts[1]]);
                //Это служебная ссылка
//print_r ($controllers_dir . $this->uri_array[$parts[1]] . 'Controller.php');
                if (file_exists($controllers_dir . $this->uri_array[$parts[1]] . 'Controller.php')) {
                    require $controllers_dir . $this->uri_array[$parts[1]] . 'Controller.php';
                    $controllerName = $this->uri_array[$parts[1]] . 'Controller';
                    $controller = new $controllerName;
                }
            }
        }
    }
}