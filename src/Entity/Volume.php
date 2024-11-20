<?php

namespace App\Entity;

use App\Repository\VolumeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VolumeRepository::class)]
class Volume
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $number = null;

    /**
     * @var Collection<int, Morceaux>
     */
    #[ORM\OneToMany(targetEntity: Morceaux::class, mappedBy: 'volume')]
    private Collection $morceauxes;

    public function __construct()
    {
        $this->morceauxes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): static
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return Collection<int, Morceaux>
     */
    public function getMorceauxes(): Collection
    {
        return $this->morceauxes;
    }

    public function addMorceaux(Morceaux $morceaux): static
    {
        if (!$this->morceauxes->contains($morceaux)) {
            $this->morceauxes->add($morceaux);
            $morceaux->setVolume($this);
        }

        return $this;
    }

    public function removeMorceaux(Morceaux $morceaux): static
    {
        if ($this->morceauxes->removeElement($morceaux)) {
            // set the owning side to null (unless already changed)
            if ($morceaux->getVolume() === $this) {
                $morceaux->setVolume(null);
            }
        }

        return $this;
    }
}
