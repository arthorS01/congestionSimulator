<?php

declare(strict_types = 1);

namespace src\controller;
use \src\core\App;

class Subscribe{
    
    public function index(){
       
        try{
            App::updateViewPath("index");

            return App::getView()->render(false,cssFiles:["root","home"]);

        }catch(\Exception $e){
            return $e->getMessage();
        }
       
    }

    public function subscribe(){
       
        try{
            App::updateViewPath("subscribe");

            return App::getView()->render(true,cssFiles:["root","head","header","subscribe"]);

        }catch(\Exception $e){
            return $e->getMessage();
        }
       
    }

    public function notFound(){
        try{
            App::updateViewPath("404");

            return App::getView()->render(false);

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}