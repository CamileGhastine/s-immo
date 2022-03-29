<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PropertyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *      collectionOperations={
 *         "get"={
 *              "normalization_context"={"groups"={"properties:get"}}
 *          },
 *        "post"
 *     },
 *     itemOperations={
 *          "get"={"normalization_context"={"groups"={"get:propertie"}}
 *     },
 *     "put",
 *     "delete"
 * }
 * )
 * @ORM\Entity(repositoryClass=PropertyRepository::class)
 */
class Property
{
    /**
     * @Groups({"get:propertie", "properties:get"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"get:propertie", "properties:get"})
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @Groups({"get:propertie", "properties:get"})
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @Groups({"get:propertie", "properties:get"})
     * @ORM\Column(type="float", length=255)
     */
    private $area;

    /**
     * @Groups({"get:propertie", "properties:get"})
     * @ORM\Column(type="integer")
     */
    private $numberOfRooms;

    /**
     * @Groups({"get:propertie", "properties:get"})
     * @ORM\Column(type="integer")
     */
    private $numberOfBedrooms;

    /**
     * @Groups({"get:propertie", "properties:get"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ecoNote;

    /**
     * @Groups({"get:propertie", "properties:get"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gesNote;

    /**
     * @Groups({"get:propertie", "properties:get"})
     * @ORM\OneToOne(targetEntity=Address::class, cascade={"persist", "remove"})
     */
    private $address;

    /**
     * @Groups({"get:propertie", "properties:get"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @Groups({"get:propertie", "properties:get"})
     * @ORM\Column(type="json", nullable=true)
     */
    private $criteria = [];

    /**
     * @Groups({"get:propertie", "properties:get"})
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Owner::class, inversedBy="properties")
     */
    private $owner;

    /**
     * @Groups({"get:propertie", "properties:get"})
     * @ORM\OneToOne(targetEntity=Lease::class, mappedBy="property", cascade={"persist", "remove"})
     */
    private $lease;

    /**
     * @Groups({"get:propertie", "properties:get"})
     * @ORM\OneToMany(targetEntity=Document::class, mappedBy="property")
     */
    private $documents;

    /**
     * @Groups({"get:propertie", "properties:get"})
     * @ORM\OneToMany(targetEntity=Video::class, mappedBy="property")
     */
    private $videos;

    /**
     * @Groups({"get:propertie", "properties:get"})
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="property")
     */
    private $images;

    public function __construct()
    {
        $this->documents = new ArrayCollection();
        $this->videos = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
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

    public function getNumberOfRooms(): ?int
    {
        return $this->numberOfRooms;
    }

    public function setNumberOfRooms(int $numberOfRooms): self
    {
        $this->numberOfRooms = $numberOfRooms;

        return $this;
    }

    public function getNumberOfBedrooms(): ?int
    {
        return $this->numberOfBedrooms;
    }

    public function setNumberOfBedrooms(int $numberOfBedrooms): self
    {
        $this->numberOfBedrooms = $numberOfBedrooms;

        return $this;
    }

    public function getEcoNote(): ?string
    {
        return $this->ecoNote;
    }

    public function setEcoNote(string $ecoNote): self
    {
        $this->ecoNote = $ecoNote;

        return $this;
    }

    public function getGesNote(): ?string
    {
        return $this->gesNote;
    }

    public function setGesNote(?string $gesNote): self
    {
        $this->gesNote = $gesNote;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCriteria(): ?array
    {
        return $this->criteria;
    }

    public function setCriteria(array $criteria): self
    {
        $this->criteria = $criteria;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param mixed $area
     */
    public function setArea($area): void
    {
        $this->area = $area;
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

    public function getLease(): ?Lease
    {
        return $this->lease;
    }

    public function setLease(?Lease $lease): self
    {
        // unset the owning side of the relation if necessary
        if ($lease === null && $this->lease !== null) {
            $this->lease->setProperty(null);
        }

        // set the owning side of the relation if necessary
        if ($lease !== null && $lease->getProperty() !== $this) {
            $lease->setProperty($this);
        }

        $this->lease = $lease;

        return $this;
    }

    /**
     * @return Collection<int, Document>
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->setProperty($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->documents->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getProperty() === $this) {
                $document->setProperty(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Video>
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Video $video): self
    {
        if (!$this->videos->contains($video)) {
            $this->videos[] = $video;
            $video->setProperty($this);
        }

        return $this;
    }

    public function removeVideo(Video $video): self
    {
        if ($this->videos->removeElement($video)) {
            // set the owning side to null (unless already changed)
            if ($video->getProperty() === $this) {
                $video->setProperty(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setProperty($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getProperty() === $this) {
                $image->setProperty(null);
            }
        }

        return $this;
    }
}
