<?php

declare(strict_types = 1);

namespace src\controller;
use \src\core\App;
use \src\model\Call as callModel;
use \src\controller\Subscribe;
use \src\model\Subscribe as subscriberModel;

class Call{
    public function index(){
        try{

            if(!APP::$session->isActive()){
                header("location:".\SITE_NAME);
            }
            
            App::$session->store("active-user",true);

   
            //validation
                if(!App::$session->check("phone-number")){
                    App::$session->store("phone-number",$_GET["phone-number"]);
                }
              
        

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

            $model = new callModel();
            $data = $model->getCalls();

            App::updateViewPath("call_report");

            return App::getView()->render(true,cssFiles:["root","head","header","call_report"],param:$data);

        }catch(\Exception $e){
            return $e->getMessage();
        }

    }

    public function delete(){
        if($_SERVER["REQUEST_METHOD"] == "DELETE"){
            
            $response=[
                "status"=>true,
            ];

            $data = JSON_decode(file_get_contents("php://input"),true);      
           
            $model = new callModel();
            $result = $model->delete($data["id"]);

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

    public function simulate(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            $response=[
                "status"=>true,
            ];

            $data = JSON_decode(file_get_contents("php://input"),true);

            $model = new callModel();
            $result = (new subscriberModel())->getAllSubscribers();
            $pairs = array_chunk($result,(int)ceil(count($result)/2));
            $lenght = count($pairs[1]);
            $status= 1;
            $caller_status;
            $call_patner;
            
            for($i = 0; $i < $lenght; $i++){

                if($i+1 > $data["band_width"]){
                    $status=0;
                }

                switch($data["caller_number"]){

                    case  $pairs[0][$i]["phone_number"]:
                            $caller_status = 0;
                            $call_patner = $pairs[1][$i]["name"];
                            break;
                    case $pairs[1][$i]["phone_number"]:
                            $caller_status = 1;
                            $call_patner = $pairs[0][$i]["name"];
                            break;
                }

                 $set = ["caller_id"=>$pairs[0][$i]["id"], "receiver_id"=>$pairs[0][$i]["id"],"status"=>$status];
                // $model->addCall($set);  
            }
            

            $response["caller_status"] = $caller_status;
            $response["call_patner"] = $call_patner;

            return JSON_encode($response);
        }
    }
}