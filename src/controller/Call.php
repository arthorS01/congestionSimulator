<?php

declare(strict_types = 1);

namespace src\controller;
use \src\core\App;

class Call{
    public function index(){
        try{

            if(!APP::$session->isActive()){
                header("location:".\SITE_NAME);
            }
            
            App::$session->store("active-user",true);

   
            //validation
                App::$session->store("phone-number",$_GET["phone-number"]);
        

            App::updateViewPath("call");

            return App::getView()->render(true,cssFiles:["root","head","header","call"],param:["phone_number"=>App::$session->get("phone-number")]);

        }catch(\Exception $e){
            return $e->getMessage();
        }

       
    }

    public function report(){
        try{

            if(!APP::$session->isActive()){
                header("location:".\SITE_NAME);
            }

            App::updateViewPath("call_report");

            return App::getView()->render(true,cssFiles:["root","head","header","call_report"]);

        }catch(\Exception $e){
            return $e->getMessage();
        }

    }
}