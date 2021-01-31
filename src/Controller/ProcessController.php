<?php

namespace App\Controller;

use App\MessageBus\Message\ProcessMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @package App\Controller
 */
class ProcessController extends AbstractController
{
    /**
     * @Route("/process", methods={"GET"}, name="process")
     *
     * @param MessageBusInterface $bus
     *
     * @return Response
     */
    public function action(MessageBusInterface $bus): Response
    {
        $bus->dispatch(new ProcessMessage('P01AYM', ProcessMessage::STEP_RUNNING));

        return new Response();
    }
}