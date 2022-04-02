<?php

namespace App\Controller\Auth;

use Devl0pr\RequestManagerBundle\Request\RequestManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/v1")
 */
class RegistrationController extends AbstractController
{
    #[Route(path: '/signup', methods: ['POST', 'GET'])]
    public function register(Request $request, RequestManager $requestManager)
    {
dd('aaa');
    }
}