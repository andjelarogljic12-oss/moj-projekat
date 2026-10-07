<?php

namespace App\Entity;

use App\Repository\PdvStopaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PdvStopaRepository::class)]
class PdvStopa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $osnovZaPrimenu = null;

    #[ORM\Column]
    private ?float $iznos = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOsnovZaPrimenu(): ?string
    {
        return $this->osnovZaPrimenu;
    }

    public function setOsnovZaPrimenu(string $osnovZaPrimenu): static
    {
        $this->osnovZaPrimenu = $osnovZaPrimenu;

        return $this;
    }

    public function getIznos(): ?float
    {
        return $this->iznos;
    }

    public function setIznos(float $iznos): static
    {
        $this->iznos = $iznos;

        return $this;
    }
}
