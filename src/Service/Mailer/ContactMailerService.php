<?php

namespace App\Service\Mailer;

use App\Entity\Contact;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;

class ContactMailerService
{
    private MailerInterface $mailer;
    private LoggerInterface $logger;

    public function __construct(MailerInterface $mailer, LoggerInterface $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    public function contactEmail(Contact $contact, string $path = ''): void
    {
        try {
            $email = (new TemplatedEmail())
                ->from('no-replay@rma.fr')
                ->to("d.djikine@fmcproduction.com")
                ->subject("Contact FMCProduction")
                ->htmlTemplate('mailer/contact.html.twig')
                ->context([
                    'message' => $contact->getContent(),
                ])
            ;
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $exception) {
            $this->logger
                ->error(sprintf("Email %s doesn't send.\n %s", $contact->getEmail(), $exception->getMessage()));
        }
    }
}
