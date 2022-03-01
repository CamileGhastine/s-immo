<?php

namespace App\Action;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfileAction extends AbstractController
{
    public function __invoke(): ?User
    {
        dd($this->getUser());
        return $this->getUser();
    }
}
