<?php

namespace App\Tests\Unit;

use App\Entity\Property;
use App\Entity\Tenant;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class PropertyTest extends TestCase
{
    private $faker;
    private Property $property;

    protected function setUp(): void
    {
        parent::setUp();
        $this->property = new Property();
        $this->faker = Factory::create();
    }

    public function testGetTitle() : void
    {
        $title = 'Article I';

        $response = $this->property->setTitle($title);
        self::assertInstanceOf(Property::class, $response);
        self::assertEquals($title, $this->property->getTitle());
    }

    /*public function testGetArea() : void
    {
        $number = 55;
        $response = $this->property->setArea($number);
        //dd($response);
        self::assertInstanceOf(Property::class, $response);
        self::assertEquals($number, $this->property->getArea());
    }*/

    public function testGetNumberOfRooms() : void
    {
        $number = 5;
        $response = $this->property->setNumberOfRooms($number);
        self::assertInstanceOf(Property::class, $response);
        self::assertEquals($number, $this->property->getNumberOfRooms());
    }

    public function testGetNumberOfBedrooms() : void
    {
        $number = 5;
        $response = $this->property->setNumberOfBedrooms($number);
        self::assertInstanceOf(Property::class, $response);
        self::assertEquals($number, $this->property->getNumberOfBedrooms());
    }

    public function testGetType() : void
    {
        $value = "studio";
        $response = $this->property->setType($value);
        self::assertInstanceOf(Property::class, $response);
        self::assertEquals($value, $this->property->getType());
    }

    public function testGetEcoNote() : void
    {
        $value = "Note...";
        $response = $this->property->setEcoNote($value);
        self::assertInstanceOf(Property::class, $response);
        self::assertEquals($value, $this->property->getEcoNote());
    }

    public function testGetGesNote() : void
    {
        $value = "Note...";
        $response = $this->property->setGesNote($value);
        self::assertInstanceOf(Property::class, $response);
        self::assertEquals($value, $this->property->getGesNote());
    }

    public function testGetDescription() : void
    {
        $value = "Descrip...";
        $response = $this->property->setDescription($value);
        self::assertInstanceOf(Property::class, $response);
        self::assertEquals($value, $this->property->getDescription());
    }

    public function testGetCriteria() : void
    {
        $value = ["Criteria..."];
        $response = $this->property->setCriteria($value);
        self::assertInstanceOf(Property::class, $response);
        self::assertEquals($value, $this->property->getCriteria());
    }

    public function testGetStatus() : void
    {
        $value = "OK";
        $response = $this->property->setStatus($value);
        self::assertInstanceOf(Property::class, $response);
        self::assertEquals($value, $this->property->getStatus());
    }

    /*public function testGetValidated() : void
    {
        $response = $this->tenant->setValidated();
        //dump("res", $response);
        self::assertInstanceOf(Tenant::class, $response);
        self::assertTrue($response);
    }*/
}
