<?php

namespace App\Services\SoapServer;

use SoapServer;
use App\Interfaces\SoapServerInterface;

final class SoapServerService implements SoapServerInterface
{
    /**
     * @var SoapServer $soapServer
     */
    private SoapServer $soapServer;

    /**
     * {@inheritdoc}
     */
    public function initServer(string $wsdl, object $data): void
    {
        $this->soapServer = new SoapServer($wsdl, ['cache_wsdl' => WSDL_CACHE_NONE]);
        $this->soapServer->setObject($data);
    }

    /**
     * {@inheritdoc}
     */
    public function handle(): void
    {
        ob_start();
        $this->soapServer->handle();
    }
}