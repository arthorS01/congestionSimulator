<?php

declare(strict_types = 1);

namespace src\Exception;

class InvalidSession extends \Exception{
    protected $message = "The session doesn't exist";
}