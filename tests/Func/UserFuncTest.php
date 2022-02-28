<?php

namespace App\Tests\Func;

use phpDocumentor\Reflection\Types\This;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Faker\Factory;

class UserFuncTest extends EndPoint
{
    /**
     * TODO
     */
    /*private $userData = ["email"=>"test@test.fr", "roles"=>["ROLE_USER"], "password"=>"password", "firstname"=>"firstname", "lastname"=>"lastname"];
    //private $userData = '{"name": "test@test.fr", "password": "password"}';
    public function testGetUsers()
    {
        $response = $this->getQuery(Request::METHOD_GET, '/api/users');
        self::assertEquals(Response::HTTP_OK, intval($response->getStatusCode()));
    }

    public function testPostUsers(): void
    {
        $userDataJson = json_encode($this->userData);
        //dd([$userDataJson]);
        //private $userData = ["email"=>"test@test.fr", "roles"=>["ROLE_USER"], "password"=>"password", "firstname"=>"firstname", "lastname"=>"lastname"];
        $response = $this->getQuery(Request::METHOD_POST,'/api/users',['json' => ['email' => "test@test.fr", "roles"=>["ROLE_USER"], "password"=>"password", "firstname"=>"firstname", "lastname"=>"lastname"]]);
        $responseContent = $response->getContent();
        //dd("status code", $responseContent);
        $responseDecode = json_decode($responseContent);
        //self::assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
        self::assertJson($response->getContent());
        self::assertNotEmpty($responseDecode);
    }

    private function getData(): string
    {
        $faker = Factory::create();
        return sprintf($this->userData, $faker->email);
    }*/
}
