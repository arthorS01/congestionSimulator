<?php

declare(strict_types = 1);

namespace src\Exception;

class PageNotFound extends \Exception{
    protected $message = "The page you are looking for does not exist";
}