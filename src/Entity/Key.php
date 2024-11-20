<?php

namespace App\Entity;

use App\Repository\KeyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KeyRepository::class)]
#[ORM\Table(name: '`key`')]
class Key
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(nullable: true)]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $keyChord = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKeyChord(): ?string
    {
        return $this->keyChord;
    }

    public function setKeyChord(string $keyChord): static
    {
        $this->keyChord = $keyChord;

        return $this;
    }
}
