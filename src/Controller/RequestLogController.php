<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Attributes\RequestLogAttribute;

class RequestLogController extends AbstractController
{
    #[Route('/request/log', name: 'request_log')]
    #[RequestLogAttribute(database: 'Demo Database', collection: 'Demo Collection')]
    public function index(): Response
    {
        return $this->render('request_log/index.html.twig', [
            'controller_name' => 'RequestLogController',
        ]);
    }
}
