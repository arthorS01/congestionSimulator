<?php

declare(strict_types = 1);

namespace src\model;
use \src\core\App;

class Subscribe{

    public function add($param){
       $status = true;

        try{
            $query = "INSERT INTO subscribers (name,service_provider,status,phone_number) VALUES(:name,:service_provider,1,:phone_number)";
            
            $status = App::$db->create($query,$param);
            
        }catch(\Exception $e){
            
            $status = false;
        }
       

      
        return $status;
    }

    public function readUnit($param){

    
        $query = "SELECT {$param['field']} FROM subscribers WHERE id = :id";
       
        $data = App::$db->read($query,["id"=>$param["id"]]);
        
        return ($data->fetch(\PDO::FETCH_ASSOC))[$param['field']];
    }

    public function getAllSubscribers(){
        $query = "SELECT * FROM subscribers";
        $data = App::$db->read($query);
        
        return $data->fetchAll(\PDO::FETCH_ASSOC);
    }
}