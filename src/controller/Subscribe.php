<?php

declare(strict_types = 1);

namespace src\controller;
use \src\core\App;
use \src\core\Sanitizer;
use \src\model\Subscribe as subscriberModel;

class Subscribe{
    
    public function index(){
       
        try{
            
            App::updateViewPath("index");
            $data = (new subscriberModel())->getAllSubscribers();
            return App::getView()->render(false,cssFiles:["root","home"],param:$data);

        }catch(\Exception $e){
            return $e->getMessage();
        }
       
    }

    public function add(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $response=[
                "status"=>true,
                "msg"=>"Added Successfully!"
            ];

            $data = JSON_decode(file_get_contents("php://input"),true);
            
            $data["fname"] = Sanitizer::clean( $data["fname"]);
            $data["lname"]= Sanitizer::clean( $data["lname"]);
            $data["name"] = $data["fname"]." ".$data["lname"];
            $data["phone_number"] = Sanitizer::clean( $data["phone_number"]);
            $data["service_provider"] = Sanitizer::clean( $data["service_provider"]);

        

            if(($data["fname"]) == "" || ($data["lname"]) == "" || $data["phone_number"]== "" || $data["service_provider"] == "" ){
                $response["msg"]="Please fill out all fields";
                $response["status"] =  false;
            }else{
                $model = new subscriberModel();

                $param = [];
                $param["name"] = $data["name"];
                $param["phone_number"] = $data["phone_number"] ;
                $param["service_provider"]=   $data["service_provider"];

               if(!$model->add($param)){
                $response["status"] =  false;
                $response["msg"] =  "Failed to add data";
               }
            }

            return JSON_encode($response);
        }
    }
    public function subscribe(){

        if(!APP::$session->isActive()){
            header("location:".\SITE_NAME);
        }

       
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

    public function getData($field,$id){
        $model = new subscriberModel();
        $data = $model->readUnit(["field"=>$field,"id"=>$id]);
       
        return $data;
    }
}