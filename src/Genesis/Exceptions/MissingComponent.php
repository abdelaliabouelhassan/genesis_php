<?php

namespace Genesis\Exceptions;

class MissingComponent extends \Exception
{
    public function __construct($message = '', $code = 0, $previous = null)
    {
	    if (empty($message)) {
		    $message = "Missing component, update and verify your installation!";
	    }

        parent::__construct($message, $code, $previous);
    }
}