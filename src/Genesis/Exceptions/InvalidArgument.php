<?php

namespace Genesis\Exceptions;

class InvalidArgument extends \Exception
{
    public function __construct($message = '', $code = 0, $previous = null)
    {
        if (empty($message)) {
	        $message = "The supplied argument is invalid for this method.";
        }

        parent::__construct($message, $code, $previous);
    }
}