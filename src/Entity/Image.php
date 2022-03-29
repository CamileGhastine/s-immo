<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
{
    /**
     * @Groups({"properties:get", "post:get"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"get:propertie", "properties:get", "post:get"})
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @Groups({"properties:get"})
     * @ORM\Column(type="string", length=255)
     */
    private $path;

    /**
     * @Groups({"properties:get"})
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @Groups({"properties:get"})
     * @ORM\ManyToOne(targetEntity=Property::class, inversedBy="images")
     */
    private $property;

    /**
     * @ORM\ManyToOne(targetEntity=Post::class, inversedBy="images")
     */
    private $post;

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

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

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

    public function getProperty(): ?Property
    {
        return $this->property;
    }

    public function setProperty(?Property $property): self
    {
        $this->property = $property;

        return $this;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): self
    {
        $this->post = $post;

        return $this;
    }
}
