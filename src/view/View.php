<?php

declare(strict_types = 1);

namespace src\View;

class View{

    public function setPath($path):void{
        $this->path = $path;
    }

    public function render($param=[]):string{
        $path = \VIEW_PATH.$this->path.".php";
        $header =\VIEW_PATH."header.php";
        $footer = \VIEW_PATH."footer.php";

        if(file_exists($path)){
            ob_start();
            require_once $header;
            require_once $path;
            require_once $footer;
            return ob_get_clean();
        }

        throw new \src\Exception\ViewNotFound();
        
    }
}