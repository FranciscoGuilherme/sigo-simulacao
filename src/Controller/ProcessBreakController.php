<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\MessageBus\Message\ProcessMessage;

/**
 * @package App\Controller
 */
class ProcessBreakController extends AbstractController
{
    /**
     * @Route("/process/break", methods={"GET"}, name="process")
     *
     * @param MessageBusInterface $bus
     *
     * @return JsonResponse
     */
    public function action(Request $request, MessageBusInterface $bus): JsonResponse
    {
        $requestContent = $request->toArray();

        $bus->dispatch(new ProcessMessage($requestContent['name'], ProcessMessage::STEP_RUNNING));

        return new JsonResponse([
            'message' => 'Mensagem adicionada na fila com sucesso'
        ], Response::HTTP_OK);
    }
}