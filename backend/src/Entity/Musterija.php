<?php

namespace App\Entity;

use App\Repository\MusterijaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusterijaRepository::class)]
class Musterija
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 9)]
    private ?string $pib = null;

    #[ORM\Column(length: 50)]
    private ?string $nazivFirme = null;

    #[ORM\Column(length: 50)]
    private ?string $vrstaMaterijala = null;

    #[ORM\Column]
    private ?float $potrebnaKolicina = null;

    #[ORM\Column(length: 50)]
    private ?string $jedinicaMere = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPib(): ?string
    {
        return $this->pib;
    }

    public function setPib(string $pib): static
    {
        $this->pib = $pib;

        return $this;
    }

    public function getNazivFirme(): ?string
    {
        return $this->nazivFirme;
    }

    public function setNazivFirme(string $nazivFirme): static
    {
        $this->nazivFirme = $nazivFirme;

        return $this;
    }

    public function getVrstaMaterijala(): ?string
    {
        return $this->vrstaMaterijala;
    }

    public function setVrstaMaterijala(string $vrstaMaterijala): static
    {
        $this->vrstaMaterijala = $vrstaMaterijala;

        return $this;
    }

    public function getPotrebnaKolicina(): ?float
    {
        return $this->potrebnaKolicina;
    }

    public function setPotrebnaKolicina(float $potrebnaKolicina): static
    {
        $this->potrebnaKolicina = $potrebnaKolicina;

        return $this;
    }

    public function getJedinicaMere(): ?string
    {
        return $this->jedinicaMere;
    }

    public function setJedinicaMere(string $jedinicaMere): static
    {
        $this->jedinicaMere = $jedinicaMere;

        return $this;
    }
}
