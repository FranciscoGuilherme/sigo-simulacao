<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Services\OrdersService;
use App\Interfaces\SoapServerInterface;

/**
 * @package App\Controller
 */
class OrdersController extends AbstractController
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
     * @Route("/legacy/orders")
     *
     * @param OrdersService $ordersService
     * 
     * @return Response
     */
    public function index(OrdersService $ordersService): Response
    {
        $this->soapServerInterface->initServer('orders.wsdl', $ordersService);
        $this->soapServerInterface->handle();

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');
        $response->setContent(ob_get_clean());

        return $response;
    }
}