<?php

require __DIR__."../../vendor/autoload.php";
require_once __DIR__."../../src/config/config.php";

use src\core\Router;
use src\core\App;
use src\controller\{Subscribe,Sim,Call};

try{


$router = new Router;

$router->get("/",[Subscribe::class,"index"])
        ->get("index.php/",[Subscribe::class,"index"])
        ->get("call/",[Call::class,"index"])
        ->get("subscribe/",[Subscribe::class,"subscribe"])
        ->get("sim-report/",[Sim::class,"report"])
        ->get("call-report/",[Call::class,"report"])
        ->get("notFound/",[Subscribe::class,"notFound"]);

echo (new App($router))->render(
        $_SERVER["REQUEST_URI"], 
        $_SERVER["REQUEST_METHOD"]
);

}catch(\Exception $e){

        header("location:".SITE_NAME."notFound/");
        echo $e->getMessage();
}