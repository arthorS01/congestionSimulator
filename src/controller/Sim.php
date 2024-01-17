<?php

declare(strict_types = 1);

namespace src\controller;
use \src\core\App;
use \src\model\Sim as simModel;

class Sim{
    public function report(){
        try{

            if(!APP::$session->isActive()){
                header("location:".\SITE_NAME);
            }


            App::updateViewPath("sim_report");

            $model = new simModel();
            $result = $model->read(App::$session->get("phone-number"));

            return App::getView()->render(true,cssFiles:["root","head","header","sim_report"],param:$result);

        }catch(\Exception $e){
            return $e->getMessage();
        }

    }
}