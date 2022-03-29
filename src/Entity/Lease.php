<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LeaseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=LeaseRepository::class)
 */
class Lease
{
    /**
     * @Groups({"properties:get"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"get:propertie"})
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @Groups({"properties:get"})
     * @ORM\Column(type="float")
     */
    private $rentingAmount;

    /**
     * @Groups({"properties:get"})
     * @ORM\Column(type="datetime")
     */
    private $leasedAt;

    /**
     * @Groups({"properties:get"})
     * @ORM\Column(type="integer")
     */
    private $duration;

    /**
     * @Groups({"properties:get"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $irlDate;

    /**
     * @Groups({"properties:get"})
     * @ORM\Column(type="float", nullable=true)
     */
    private $irl;

    /**
     * @Groups({"properties:get"})
     * @ORM\Column(type="float")
     */
    private $securityDeposit;

    /**
     * @Groups({"properties:get"})
     * @ORM\Column(type="integer")
     */
    private $dateOfPayment;

    /**
     * @Groups({"properties:get"})
     * @ORM\Column(type="array", nullable=true)
     */
    private $guarantor = [];

    /**
     * @ORM\OneToOne(targetEntity=Property::class, inversedBy="lease", cascade={"persist", "remove"})
     */
    private $property;

    /**
     * @ORM\OneToMany(targetEntity=Tenant::class, mappedBy="lease")
     */
    private $tenant;

    public function __construct()
    {
        $this->tenant = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRentingAmount(): ?float
    {
        return $this->rentingAmount;
    }

    public function setRentingAmount(float $rentingAmount): self
    {
        $this->rentingAmount = $rentingAmount;

        return $this;
    }

    public function getLeasedAt(): ?\DateTime
    {
        return $this->leasedAt;
    }

    public function setLeasedAt(\DateTime $leasedAt): self
    {
        $this->leasedAt = $leasedAt;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getIrlDate(): ?string
    {
        return $this->irlDate;
    }

    public function setIrlDate(?string $irlDate): self
    {
        $this->irlDate = $irlDate;

        return $this;
    }

    public function getIrl(): ?float
    {
        return $this->irl;
    }

    public function setIrl(?float $irl): self
    {
        $this->irl = $irl;

        return $this;
    }

    public function getSecurityDeposit(): ?float
    {
        return $this->securityDeposit;
    }

    public function setSecurityDeposit(?float $securityDeposit): self
    {
        $this->securityDeposit = $securityDeposit;

        return $this;
    }

    public function getDateOfPayment(): ?int
    {
        return $this->dateOfPayment;
    }

    public function setDateOfPayment(int $dateOfPayment): self
    {
        $this->dateOfPayment = $dateOfPayment;

        return $this;
    }

    public function getGuarantor(): ?array
    {
        return $this->guarantor;
    }

    public function setGuarantor(?array $guarantor): self
    {
        $this->guarantor = $guarantor;

        return $this;
    }

    public function getProperty(): ?Property
    {
        return $this->property;
    }

    public function setProperty(?Property $property): self
    {
        $this->property = $property;

        return $this;
    }

    /**
     * @return Collection<int, Tenant>
     */
    public function getTenant(): Collection
    {
        return $this->tenant;
    }

    public function addTenant(Tenant $tenant): self
    {
        if (!$this->tenant->contains($tenant)) {
            $this->tenant[] = $tenant;
            $tenant->setLease($this);
        }

        return $this;
    }

    public function removeTenant(Tenant $tenant): self
    {
        if ($this->tenant->removeElement($tenant)) {
            // set the owning side to null (unless already changed)
            if ($tenant->getLease() === $this) {
                $tenant->setLease(null);
            }
        }

        return $this;
    }
}
