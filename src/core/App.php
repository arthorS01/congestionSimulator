<?php

declare(strict_types = 1);

namespace src\core;

class App{

    public static DB $db;
    private static \src\view\View $view;
    private Router $router;
    public static $session;

    public function __construct($router){
    
        
        $this->router = $router;
        self::$view = new \src\View\View();
        self::$db = new DB();
        self::$session = new Session();
    }

    public function render($request_uri,$request_method):string{

        return $this->router->render($request_uri,$request_method);
    }

    public static function updateViewPath($path):void{
        self::$view->setPath($path);
    }

    public static function getView():\src\View\View{
        return self::$view;
    }

}