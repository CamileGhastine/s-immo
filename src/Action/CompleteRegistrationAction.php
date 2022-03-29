<?php

namespace App\Action;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PropertyAccess\PropertyAccess;

class CompleteRegistrationAction extends AbstractController
{
    protected const PUBLIC_FIELDS = [
        'plain_password',
        'first_name',
        'last_name',
        'mode',
        'title',
        'civility',
        'profession',
        'speciality',
        'birth_date',
        'phone_number',
        'company',
        'pro_number',
        'newsletter_sign_up',
    ];

    private UserRepository $userRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    /**
     * Data here already clean, based on Groups().
     *
     * @return \App\Entity\User|JsonResponse
     */
    public function __invoke(Request $request, User $data)
    {
        $token = $request->get('registration_token');
        if (!$token) {
            return $this->invalidResponse();
        }
        $user = $this->userRepository->findOneBy(['registrationToken' => $token]);
        if (!$user) {
            return $this->invalidResponse();
        }

        return static::resolveData($user, $data);
    }

    private function invalidResponse(): JsonResponse
    {
        return $this->json(['message' => 'Invalid Token !'], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Clone the serialized user ($data) on the User from the DB.
     * Delete the Register Token.
     */
    public static function resolveData(User $user, User $data): User
    {
        $propertyAccessor = PropertyAccess::createPropertyAccessor();

        foreach (self::PUBLIC_FIELDS as $fieldName) {
            $value = $propertyAccessor->getValue($data, $fieldName);
            $propertyAccessor->setValue($user, $fieldName, $value);
        }

        $user->setRegistrationToken(null);

        return $user;
    }
}
