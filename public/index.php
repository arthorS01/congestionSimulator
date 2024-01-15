<?php

require __DIR__."../../vendor/autoload.php";
require_once __DIR__."../../src/config/config.php";

use src\core\Router;
use src\core\App;
use src\controller\{Subscriber,Sim,Call};

try{


$router = new Router;

$router->get("/",[Subscriber::class,"index"])
        ->get("index.php/",[Subscriber::class,"index"])
        ->get("notFound/",[Subscriber::class,"notFound"]);

echo (new App($router))->render(
        $_SERVER["REQUEST_URI"], 
        $_SERVER["REQUEST_METHOD"]
);

}catch(\Exception $e){

        header("location:".SITE_NAME."notFound/");
        echo $e->getMessage();
}