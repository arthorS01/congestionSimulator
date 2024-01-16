<?php

declare(strict_types = 1);

namespace src\controller;
use \src\core\App;

class Call{
    public function index(){
        try{
            App::updateViewPath("call");

            return App::getView()->render(true,cssFiles:["root","head","header","call"]);

        }catch(\Exception $e){
            return $e->getMessage();
        }

       
    }

    public function report(){
        try{
            App::updateViewPath("call_report");

            return App::getView()->render(true,cssFiles:["root","head","header","call_report"]);

        }catch(\Exception $e){
            return $e->getMessage();
        }

    }
}