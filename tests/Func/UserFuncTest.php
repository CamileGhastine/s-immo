<?php

namespace App\Tests\Func;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Faker\Factory;
use Hautelook\AliceBundle\PhpUnit\RefreshDatabaseTrait;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class UserFuncTest extends ApiTestCase
{
    use RefreshDatabaseTrait;

    public function testGetUsers()
    {
        $client = self::createClient();
        $response = $client->request(Request::METHOD_GET, '/api/users');

        /**
         * Auth
         */
        try {
            self::assertEquals(Response::HTTP_OK, $response->getStatusCode());
        } catch (TransportExceptionInterface $e) {
        }
    }

    public function testPostUsers(): void
    {
        $faker = Factory::create();
        $data = ['json' => ['email' => $faker->safeEmail, "roles"=>["ROLE_USER"], "password"=>"password", "firstname"=>"firstname", "lastname"=>"lastname"]];

        $client = self::createClient();
        $response = $client->request(Request::METHOD_POST, '/api/users', $data);
        $responseContent = $response->getContent();
        self::assertNotEmpty(json_decode($responseContent));
        self::assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
    }
}
