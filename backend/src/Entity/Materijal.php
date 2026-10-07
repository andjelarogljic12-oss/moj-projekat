<?php

namespace App\Entity;

use App\Repository\MaterijalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaterijalRepository::class)]
class Materijal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nazivMaterijala = null;

    #[ORM\Column]
    private ?float $cenaBezPdv = null;

    #[ORM\Column]
    private ?float $stanje = null;

    #[ORM\Column(length: 50)]
    private ?string $jedinicaMere = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?PdvStopa $pdvStopa = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazivMaterijala(): ?string
    {
        return $this->nazivMaterijala;
    }

    public function setNazivMaterijala(string $nazivMaterijala): static
    {
        $this->nazivMaterijala = $nazivMaterijala;

        return $this;
    }

    public function getCenaBezPdv(): ?float
    {
        return $this->cenaBezPdv;
    }

    public function setCenaBezPdv(float $cenaBezPdv): static
    {
        $this->cenaBezPdv = $cenaBezPdv;

        return $this;
    }

    public function getStanje(): ?float
    {
        return $this->stanje;
    }

    public function setStanje(float $stanje): static
    {
        $this->stanje = $stanje;

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

    public function getPdvStopa(): ?PdvStopa
    {
        return $this->pdvStopa;
    }

    public function setPdvStopa(?PdvStopa $pdvStopa): static
    {
        $this->pdvStopa = $pdvStopa;

        return $this;
    }
}
