<?php

namespace App\Entity;

use App\Repository\StavkaNarudzbeniceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StavkaNarudzbeniceRepository::class)]
class StavkaNarudzbenice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $redniBr = null;

    #[ORM\Column]
    private ?float $kolicina = null;

    #[ORM\Column]
    private ?float $popust = null;

    #[ORM\Column(length: 3)]
    private ?string $valuta = null;

    #[ORM\Column]
    private ?float $iznosBezPdv = null;

    #[ORM\Column]
    private ?float $iznosSaPdv = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Materijal $materijal = null;

    #[ORM\ManyToOne(inversedBy: 'stavke')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Narudzbenica $narudzbenica = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRedniBr(): ?int
    {
        return $this->redniBr;
    }

    public function setRedniBr(int $redniBr): static
    {
        $this->redniBr = $redniBr;

        return $this;
    }

    public function getKolicina(): ?float
    {
        return $this->kolicina;
    }

    public function setKolicina(float $kolicina): static
    {
        $this->kolicina = $kolicina;

        return $this;
    }

    public function getPopust(): ?float
    {
        return $this->popust;
    }

    public function setPopust(float $popust): static
    {
        $this->popust = $popust;

        return $this;
    }

    public function getValuta(): ?string
    {
        return $this->valuta;
    }

    public function setValuta(string $valuta): static
    {
        $this->valuta = $valuta;

        return $this;
    }

    public function getIznosBezPdv(): ?float
    {
        return $this->iznosBezPdv;
    }

    public function setIznosBezPdv(float $iznosBezPdv): static
    {
        $this->iznosBezPdv = $iznosBezPdv;

        return $this;
    }

    public function getIznosSaPdv(): ?float
    {
        return $this->iznosSaPdv;
    }

    public function setIznosSaPdv(float $iznosSaPdv): static
    {
        $this->iznosSaPdv = $iznosSaPdv;

        return $this;
    }

    public function getMaterijal(): ?Materijal
    {
        return $this->materijal;
    }

    public function setMaterijal(?Materijal $materijal): static
    {
        $this->materijal = $materijal;

        return $this;
    }

    public function getNarudzbenica(): ?Narudzbenica
    {
        return $this->narudzbenica;
    }

    public function setNarudzbenica(?Narudzbenica $narudzbenica): static
    {
        $this->narudzbenica = $narudzbenica;

        return $this;
    }
}
