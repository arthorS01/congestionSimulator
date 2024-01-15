<?php

declare(strict_types = 1);

namespace src\Exception;

class ViewNotFound extends \Exception{
    protected $message = "View not found";
}