<?php

declare(strict_types = 1);

namespace src\controller;
use \src\core\App;
use \src\core\Sanitizer;
use \src\model\Subscribe as subscriberModel;
use \src\core\Validate;

class Subscribe{
    
    public function index(){
       
        try{
            
            App::updateViewPath("index");
            $data = (new subscriberModel())->getAllSubscribers();
            return App::getView()->render(false,pageTitle:"CM-simulator",cssFiles:["root","home"],param:$data);

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
            }elseif(Validate::checkSpecialChar($data["fname"]) || Validate::checkSpecialChar($data["lname"]) || Validate::checkSpecialChar($data["phone_number"])){
                $response["status"] =  false;
                $response["msg"] =  "Special characters like $,%,& or spaces and others are not allowed";
            }elseif(Validate::checkString($data["fname"]) || Validate::checkString($data["lname"]) ){
                $response["status"] =  false;
                $response["msg"] =  "First name and last name should contain only letters";
            }elseif(Validate::checkDigit($data["phone_number"])){
                $response["status"] =  false;
                $response["msg"] =  "Phone number should contain only digits";
            }elseif(strlen($data["phone_number"]) < 11){
                $response["status"] =  false;
                $response["msg"] =  "Phone number should be 11 digits  ";
            }elseif(!Validate::phone($data["phone_number"])){
                $response["status"] =  false;
                $response["msg"] =  "Phone number should begin with 080, 090, and the likes ";
            }else{
                $model = new subscriberModel();

                $param = [];
                $param["name"] = $data["name"];
                $param["phone_number"] = $data["phone_number"] ;
                $param["service_provider"]=   $data["service_provider"];

               if(!$model->add($param)){
                $response["status"] =  false;
                $response["msg"] =  "Number already exists or a Database error occured";
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

            return App::getView()->render(true,pageTitle:"Add Subscriber",cssFiles:["root","header","subscribe"]);

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

    public function close(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            unset($_SESSION["phone-number"]);
            unset($_SESSION["active-user"]);
        }

        header("location:".SITE_NAME);
    }
}

