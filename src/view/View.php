<?php

declare(strict_types = 1);

namespace src\View;

class View{

    public function setPath($path):void{
        $this->path = $path;
    }

    public function render($headerFlag,$param=[],$cssFiles=[]):string{
        $path = \VIEW_PATH.$this->path.".php";
        $header =\VIEW_PATH."header.php";
        $footer = \VIEW_PATH."footer.php";
        $head= \VIEW_PATH."head.php";
        $body = \VIEW_PATH."body.php";


        if(file_exists($path)){
            ob_start();
            require_once $head;
            require_once $body;
            
            if($headerFlag){
                require_once $header;
            }
            require_once $path;
            require_once $footer;
            return ob_get_clean();
        }

        throw new \src\Exception\ViewNotFound();
        
    }
}