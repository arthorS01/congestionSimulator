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

            
            

            if(isset($_GET["phone-number"])){
                App::$session->store("active-user",true);
                App::$session->store("phone-number",$_GET["phone-number"]);    
                App::$session->store("user-name",(new Subscribe)->getNamefromPhone($_SESSION["phone-number"]));
            }
           
        
            App::updateViewPath("call");

            return App::getView()->render(true,pageTitle:"Simulate Call",cssFiles:["root","header","call"],param:["phone_number"=>App::$session->get("phone-number")]);

        }catch(\Exception $e){
            header("location:".\SITE_NAME);
        }

       
    }

    
    public function report(){
        try{

            if(!APP::$session->isActive()){
                header("location:".\SITE_NAME);
            }

            $model = new callModel();
            $result = $model->getCalls();
            
            $blocked = array_filter($result,function($entry){
                
                if($entry["status"] == 0){
                    return true;
                }
            });

            $successful = array_filter($result,function($entry){
                if($entry["status"] == 1){
                    return true;
                }
            });
            $data["all"] = $result;
            $data["blocked"] =  $blocked;
            $data["successful"] = $successful;

            
            App::updateViewPath("call_report");

            return App::getView()->render(true,pageTitle:"Call Report",cssFiles:["root","header","call_report","print"],param:$data);

        }catch(\Exception $e){
            header("location:".\SITE_NAME);
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
                "data"=>[]
            ];

            $data = JSON_decode(file_get_contents("php://input"),true);

            $model = new callModel();
            $db_data = (new subscriberModel())->getAllSubscribers();
            shuffle($db_data);
            //get only active subscribers

            $result = array_filter($db_data,function($entry){
                if($entry["status"] == 1){
                    return true;
                }
            });

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
                        $response["caller_status"] = 0;
                        $response["call_patner"] = $pairs[1][$i]["name"];
                            break;
                    case $pairs[1][$i]["phone_number"]:
                        $response["caller_status"] = 1;
                        $response["call_patner"] = $pairs[0][$i]["name"];
                            break;
                }

                 $set = ["caller_id"=>$pairs[0][$i]["id"], "receiver_id"=>$pairs[1][$i]["id"],"status"=>$status];
                 $call_record = ["caller_name"=>$pairs[0][$i]["name"],"receiver_name"=>$pairs[1][$i]["name"],"receiver_number"=>$pairs[1][$i]["phone_number"],"status"=>$status ];
                 $model->addCall($set);
                    array_push($response["data"],$call_record);
            }
        

            return JSON_encode($response);
        }
    }
}