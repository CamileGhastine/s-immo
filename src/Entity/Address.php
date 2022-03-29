<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AddressRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AddressRepository::class)
 */
class Address
{
    /**
     * @Groups({"properties:get"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"properties:get"})
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @Groups({"get:propertie", "properties:get"})
     * @ORM\Column(type="string", length=255)
     */
    private $street;

    /**
     * @Groups({"properties:get"})
     * @ORM\Column(type="integer")
     */
    private $zipCode;

    /**
     * @Groups({"properties:get"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $additionalAddressInfo;

    /**
     * @Groups({"properties:get"})
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @Groups({"properties:get"})
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity=Owner::class, inversedBy="addresses")
     */
    private $owner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getZipCode(): ?int
    {
        return $this->zipCode;
    }

    public function setZipCode(int $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getAdditionalAddressInfo(): ?string
    {
        return $this->additionalAddressInfo;
    }

    public function setAdditionalAddressInfo(string $additionalAddressInfo): self
    {
        $this->additionalAddressInfo = $additionalAddressInfo;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getOwner(): ?Owner
    {
        return $this->owner;
    }

    public function setOwner(?Owner $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
}
