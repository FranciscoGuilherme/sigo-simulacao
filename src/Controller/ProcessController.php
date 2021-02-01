<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Services\ProcessService;
use App\Interfaces\SoapServerInterface;

/**
 * @package App\Controller
 */
class ProcessController extends AbstractController
{
    /**
     * @var SoapServerInterface $soapServerInterface
     */
    private SoapServerInterface $soapServerInterface;

    /**
     * @param SoapServerInterface $soapServerInterface
     */
    public function __construct(SoapServerInterface $soapServerInterface)
    {
        $this->soapServerInterface = $soapServerInterface;
    }

    /**
     * @Route("/legacy/process")
     * 
     * @param ProcessService $processService
     * 
     * @return Response
     */
    public function index(ProcessService $processService): Response
    {
        $this->soapServerInterface->initServer('process.wsdl', $processService);
        $this->soapServerInterface->handle();

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');
        $response->setContent(ob_get_clean());

        return $response;
    }
}