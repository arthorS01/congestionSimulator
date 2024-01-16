<?php

declare(strict_types = 1);

namespace src\controller;
use \src\core\App;

class Sim{
    public function report(){
        try{
            App::updateViewPath("sim_report");

            return App::getView()->render(true,cssFiles:["root","head","header","sim_report"]);

        }catch(\Exception $e){
            return $e->getMessage();
        }

    }
}