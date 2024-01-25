<?php
 
namespace App\Exceptions;
 
use Exception;
use Illuminate\Support\Facades\Log;
 
class InvalidPostException extends Exception
{
    // ...
 
    // /**
    //  * Get the exception's context information.
    //  *
    //  * @return array
    //  */
    // public function context()
    // {
    //     Log::error($this->getMessage());
    // }
    public function report()
    {
        Log::error($this->getMessage());
    }
}