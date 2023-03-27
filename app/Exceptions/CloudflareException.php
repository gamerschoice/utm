<?php

namespace App\Exceptions;

use Exception;

class CloudflareException extends Exception
{
    protected $status;
    
    public function __construct(string $message, $status)
    {
        $this->message = $message;
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
