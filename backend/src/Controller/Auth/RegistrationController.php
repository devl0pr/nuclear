<?php

namespace App\Controller\Auth;

use App\Entity\Auth\PersonTmp;
use App\Workers\RequestManager\Auth\RegistrationRequestRule;
use Devl0pr\RequestManagerBundle\Request\RequestManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/v1")
 */
class RegistrationController extends AbstractController
{
    #[Route(path: '/signup', methods: ['POST'])]
    public function register(
        EntityManagerInterface $em,
        RequestManager $requestManager,
        RegistrationRequestRule $registrationRequestRule
    ) {
        $data = $requestManager->validate($registrationRequestRule);

        $personTmp = new PersonTmp();
        $personTmp->setEmail($data['email']);

        $em->persist($personTmp);
        $em->flush();

        dd($data);
    }
}