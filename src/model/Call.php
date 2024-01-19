<?php

declare(strict_types = 1);

namespace src\model;
use \src\core\App;

class Call{
    public function delete($id){

        $query = "DELETE FROM simulated_calls WHERE id = :id";
       
        $data = App::$db->delete($query,(int)$id);

        
        return $data;
    
    }

    public function addCall($param){

        $query = "INSERT INTO simulated_calls(caller_id,receiver_id,status) VALUES (:caller_id,:receiver_id,:status)";
       
        $status = App::$db->create($query,$param);

        return $status;
    }

    public function getCalls(){
        $query = "SELECT subscribers.name,subscribers.phone_number,simulated_calls.date,simulated_calls.id,simulated_calls.receiver_id,simulated_calls.status 
        FROM subscribers INNER JOIN simulated_calls ON subscribers.id = simulated_calls.caller_id ORDER BY subscribers.id DESC ";

        $data = App::$db->read($query);

        return $data->fetchAll(\PDO::FETCH_ASSOC);
    }
}