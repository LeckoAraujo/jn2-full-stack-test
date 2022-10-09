<?php

namespace App\Exceptions;

class ErrorDefault
{

    function errorDefault($message)
    {
        return array('message' => $message);
    }


}