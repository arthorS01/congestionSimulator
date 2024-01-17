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
}