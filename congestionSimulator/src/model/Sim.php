<?php

declare(strict_types = 1);

namespace src\model;
use \src\core\App;

class Sim{
    public function read($param){
        $query = "SELECT * FROM subscribers";

        $data = App::$db->read($query);
      
        return $data->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function update($param){
        
        $query = "UPDATE subscribers SET status = :status WHERE id = :id";

        $data = App::$db->update($query,$param);

        return $data;
    }
}