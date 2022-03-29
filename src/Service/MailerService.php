<?php

namespace App\Service;

use App\Entity\User;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;

class MailerService
{
    private MailerInterface $mailer;
    private LoggerInterface $logger;

    public function __construct(MailerInterface $mailer, LoggerInterface $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    public function confirmRegitrationEmail(User $user, string $path = ''): void
    {
        try {
            $email = (new TemplatedEmail())
                ->from('djikine.d@outlook.fr')
                ->to($user->getEmail())
                ->subject("s-immo Confirmation d'email.")
                ->htmlTemplate('mailer/registration.html.twig')
                ->context([
                    'registrationPath' => $path,
                    'token' => $user->getRegistrationToken(),
                ])
            ;
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $exception) {
            $this->logger
                ->error(sprintf("Email %s doesn't send.\n %s", $user->getEmail(), $exception->getMessage()));
        }
    }
}
