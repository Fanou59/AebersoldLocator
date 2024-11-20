<?php

namespace App\Entity;

use App\Repository\MorceauxRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MorceauxRepository::class)]
class Morceaux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\ManyToOne(inversedBy: 'morceauxes')]
    private ?Volume $volume = null;

    #[ORM\ManyToOne]
    private ?Style $style = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Key $keyChord = null;

    #[ORM\ManyToOne]
    private ?Tempo $tempo = null;

    #[ORM\ManyToOne]
    private ?Track $track = null;

    #[ORM\ManyToOne]
    private ?Chorus $chorus = null;

    #[ORM\ManyToOne]
    private ?Disc $disc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getVolume(): ?Volume
    {
        return $this->volume;
    }

    public function setVolume(?Volume $volume): static
    {
        $this->volume = $volume;

        return $this;
    }

    public function getStyle(): ?Style
    {
        return $this->style;
    }

    public function setStyle(?Style $style): static
    {
        $this->style = $style;

        return $this;
    }

    public function getKeyChord(): ?Key
    {
        return $this->keyChord;
    }

    public function setKeyChord(?Key $keyChord): static
    {
        $this->keyChord = $keyChord;

        return $this;
    }

    public function getTempo(): ?Tempo
    {
        return $this->tempo;
    }

    public function setTempo(?Tempo $tempo): static
    {
        $this->tempo = $tempo;

        return $this;
    }

    public function getTrack(): ?Track
    {
        return $this->track;
    }

    public function setTrack(?Track $track): static
    {
        $this->track = $track;

        return $this;
    }

    public function getChorus(): ?Chorus
    {
        return $this->chorus;
    }

    public function setChorus(?Chorus $chorus): static
    {
        $this->chorus = $chorus;

        return $this;
    }

    public function getDisc(): ?Disc
    {
        return $this->disc;
    }

    public function setDisc(?Disc $disc): static
    {
        $this->disc = $disc;

        return $this;
    }
}
