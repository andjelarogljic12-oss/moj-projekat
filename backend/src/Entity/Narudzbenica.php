<?php

namespace App\Entity;

use App\Repository\NarudzbenicaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NarudzbenicaRepository::class)]
class Narudzbenica
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $datum = null;

    #[ORM\Column]
    private ?float $ukupnaKolicina = null;

    #[ORM\Column]
    private ?float $ukupnaCenaBezPdv = null;

    #[ORM\Column]
    private ?float $ukupnaCenaSaPdv = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Musterija $musterija = null;

    /**
     * @var Collection<int, StavkaNarudzbenice>
     */
    #[ORM\OneToMany(targetEntity: StavkaNarudzbenice::class, mappedBy: 'narudzbenica', orphanRemoval: true)]
    private Collection $stavke;

    public function __construct()
    {
        $this->stavke = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatum(): ?\DateTime
    {
        return $this->datum;
    }

    public function setDatum(\DateTime $datum): static
    {
        $this->datum = $datum;

        return $this;
    }

    public function getUkupnaKolicina(): ?float
    {
        return $this->ukupnaKolicina;
    }

    public function setUkupnaKolicina(float $ukupnaKolicina): static
    {
        $this->ukupnaKolicina = $ukupnaKolicina;

        return $this;
    }

    public function getUkupnaCenaBezPdv(): ?float
    {
        return $this->ukupnaCenaBezPdv;
    }

    public function setUkupnaCenaBezPdv(float $ukupnaCenaBezPdv): static
    {
        $this->ukupnaCenaBezPdv = $ukupnaCenaBezPdv;

        return $this;
    }

    public function getUkupnaCenaSaPdv(): ?float
    {
        return $this->ukupnaCenaSaPdv;
    }

    public function setUkupnaCenaSaPdv(float $ukupnaCenaSaPdv): static
    {
        $this->ukupnaCenaSaPdv = $ukupnaCenaSaPdv;

        return $this;
    }

    public function getMusterija(): ?Musterija
    {
        return $this->musterija;
    }

    public function setMusterija(?Musterija $musterija): static
    {
        $this->musterija = $musterija;

        return $this;
    }

    /**
     * @return Collection<int, StavkaNarudzbenice>
     */
    public function getStavke(): Collection
    {
        return $this->stavke;
    }

    public function addStavke(StavkaNarudzbenice $stavke): static
    {
        if (!$this->stavke->contains($stavke)) {
            $this->stavke->add($stavke);
            $stavke->setNarudzbenica($this);
        }

        return $this;
    }

    public function removeStavke(StavkaNarudzbenice $stavke): static
    {
        if ($this->stavke->removeElement($stavke)) {
            // set the owning side to null (unless already changed)
            if ($stavke->getNarudzbenica() === $this) {
                $stavke->setNarudzbenica(null);
            }
        }

        return $this;
    }
}
