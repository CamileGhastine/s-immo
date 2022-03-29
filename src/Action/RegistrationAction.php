<?php

namespace App\Action;

use App\Entity\User;
use App\Helper\StringHelper;
use App\Service\MailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RegistrationAction extends AbstractController
{
    /*
    private MailerService $mailerService;
    private $clientRegistrationPath;

    public function __construct(string $clientRegistrationPath, MailerService $mailerService)
    {
        $this->mailerService = $mailerService;
        $this->clientRegistrationPath = $clientRegistrationPath;
    }

    /**
     * Generate a random Token.
     * Send email to complete registration based on (Registration Token).
     * /
    public function __invoke(User $data): User
    {
        $data->setRegistrationToken(StringHelper::getRandomString(64));
        $this->mailerService->confirmRegitrationEmail($data, $this->clientRegistrationPath);

        return $data;
    }*/
}
