<?php

namespace App\Interfaces;

interface SoapServerInterface
{
    /**
     * @param string $wsdl
     * @param object $data
     */
    public function initServer(string $wsdl, object $data): void;

    public function handle(): void;
}