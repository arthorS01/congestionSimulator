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
            echo $e->getMessage();
        }
       

        return $status;
    }
}