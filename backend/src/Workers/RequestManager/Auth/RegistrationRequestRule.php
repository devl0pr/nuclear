<?php

namespace App\Workers\RequestManager\Auth;

use Devl0pr\RequestManagerBundle\Request\AbstractRequestRule;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationRequestRule extends AbstractRequestRule
{

    public function getValidationMap(): array
    {
        return [
            'email' => [
                'constraints' => [
                    new NotBlank(),
                    new Email(['message' => 'The email "{{ value }}" is not a valid email.'])
                ],
            ]
        ];
    }
}