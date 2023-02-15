<?php

namespace App\Entity;

use App\Repository\ReactionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

enum Type: string
{
    case LIKE = "LIKE";
    case UNLIKE = "UNLIKE";
}

#[ORM\Entity(repositoryClass: ReactionRepository::class)]
class Reaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'reactions')]
    private ?Link $link = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    // remplacer par string si marche pas
    #[ORM\Column(length: 255)]
    private ?Type $type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink(): ?Link
    {
        return $this->link;
    }

    public function setLink(?Link $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(Type $type): self
    {
        $this->type = $type;

        return $this;
    }
}