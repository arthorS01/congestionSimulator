<?php

declare(strict_types = 1);

namespace src\controller;
use \src\core\App;

class Subscriber{
    
    public function index(){
       
        try{
            App::updateViewPath("index");

            return App::getView()->render();

        }catch(\Exception $e){
            return $e->getMessage();
        }
       
    }

    public function notFound(){
        try{
            App::updateViewPath("404");

            return App::getView()->render();

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}