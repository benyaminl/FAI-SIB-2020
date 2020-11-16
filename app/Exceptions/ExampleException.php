<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class ExampleException extends Exception
{
    public function report() {
        // Log Error nya
        Log::info("Celeng ketembak!");
    }

    public function render() {
        // Ini untuk render nya
        if (env("APP_DEBUG") == false) 
            return "Ini Contoh Error yang berbeda";
        else 
            return "Ini Debug!";
    }
}
