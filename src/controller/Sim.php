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

    public function block(){

        if($_SERVER["REQUEST_METHOD"] == "UPDATE"){
            $response=[
                "status"=>true,
            ];

            $data = JSON_decode(file_get_contents("php://input"),true);      
            $data["status"] =  0;

            $model = new simModel();
            
            $result = $model->update($data);

            if(!$result){
                $response=[
                    "status"=>false,
                    "msg" =>"Failed to update"
                ]; 
            }

            $response["id"] = $data["id"];

            return JSON_encode($response);
        }

    }

    public function activate(){

        if($_SERVER["REQUEST_METHOD"] == "UPDATE"){
            $response=[
                "status"=>true,
            ];

            $data = JSON_decode(file_get_contents("php://input"),true);      
            $data["status"] =  1;
            
            $model = new simModel();
            $result = $model->update($data);

            if(!$result){
                $response=[
                    "status"=>false,
                    "msg" =>"Failed to update"
                ]; 
            }

            $response["id"] = $data["id"];

            return JSON_encode($response);
        }

    }
}