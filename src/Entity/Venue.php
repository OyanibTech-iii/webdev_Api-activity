<?php

namespace App\Entity;

use App\Repository\VenueRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\GetCollection;


#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(),
        new Put(),
        new Delete()
    ],
    normalizationContext: [
        'groups' => ['category:read']
    ],
    denormalizationContext: [
        'groups' => ['category:write']
    ]
)]

#[ORM\Entity(repositoryClass: VenueRepository::class)]
class Venue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[Groups(['Venue:read', 'Venue:write'])]

    #[ORM\Column(length: 255)]
    private ?string $name = null;
    #[Groups(['Venue:read', 'Venue:write'])]

    #[ORM\Column(length: 255)]
    private ?string $address = null;
    #[Groups(['Venue:read', 'Venue:write'])]

    #[ORM\Column]
    private ?int $capacity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): static
    {
        $this->capacity = $capacity;

        return $this;
    }
}
