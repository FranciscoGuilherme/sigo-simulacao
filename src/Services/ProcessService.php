<?php

namespace App\Services;

class ProcessService
{
    public function process()
    {
        return include('/app/config/storage/process.php');
    }
}