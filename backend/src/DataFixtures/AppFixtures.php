<?php

namespace App\DataFixtures;

use App\Entity\PdvStopa;
use App\Entity\Materijal;
use App\Entity\Musterija;
use App\Entity\Korisnik;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $osnovna = new PdvStopa();
        $osnovna->setOsnovZaPrimenu('Osnovna stopa');
        $osnovna->setIznos(0.2);
        $manager->persist($osnovna);

        $posebna = new PdvStopa();
        $posebna->setOsnovZaPrimenu('Posebna stopa');
        $posebna->setIznos(0.1);
        $manager->persist($posebna);

        $izvozna = new PdvStopa();
        $izvozna->setOsnovZaPrimenu('Izvozni radovi');
        $izvozna->setIznos(0);
        $manager->persist($izvozna);

        $materijali = [
            ['Cement', 1000, 45600, 'KG', $posebna],
            ['Malter', 2000, 56700, 'KG', $osnovna],
            ['Cigle', 1000, 54985, 'KG', $posebna],
            ['Celik', 500, 6155, 'KG', $izvozna],
            ['Crep', 500, 7920, 'M', $izvozna],
            ['Cement', 100, 500, 'KG', $osnovna],
            ['Boja', 200, 100, 'L', $osnovna],
        ];

        foreach ($materijali as [$naziv, $cena, $stanje, $jedinica, $stopa]) {
            $materijal = new Materijal();
            $materijal->setNazivMaterijala($naziv);
            $materijal->setCenaBezPdv($cena);
            $materijal->setStanje($stanje);
            $materijal->setJedinicaMere($jedinica);
            $materijal->setPdvStopa($stopa);
            $manager->persist($materijal);
        }

        $musterije = [];

        $podaciMusterija = [
            ['101973610', '012-PRIMA DOO', 'Cement', 200, 'KG'],
            ['108149067', 'ABM DOO', 'Celik', 200, 'KG'],
            ['113729720', 'ALFA KODEKS GROUP', 'Malter', 300, 'L'],
            ['109788419', 'ECO CENTAR DOO', 'Krec', 500, 'KG'],
            ['104248915', 'LICON DOO', 'Crep', 20, 'M'],
            ['123456789', 'Test doo', 'Cement', 100, 'KG'],
        ];



        foreach ($podaciMusterija as [$pib, $naziv, $vrsta, $kolicina, $jedinica]) {
            $musterija = new Musterija();
            $musterija->setPib($pib);
            $musterija->setNazivFirme($naziv);
            $musterija->setVrstaMaterijala($vrsta);
            $musterija->setPotrebnaKolicina($kolicina);
            $musterija->setJedinicaMere($jedinica);
            $manager->persist($musterija);
            $musterije[] = $musterija;
        }

        $korisnici = [
            ['andjela', []],
            ['sara', []],
            ['tina', []],
            ['ana', []],
            ['adri', []],
            ['admin', ['ROLE_ADMIN']],
        ];

        foreach ($korisnici as [$ime, $uloge]) {
            $korisnik = new Korisnik();
            $korisnik->setKorisnickoIme($ime);
            $korisnik->setRoles($uloge);
            $korisnik->setPassword($this->hasher->hashPassword($korisnik, 'test1234'));
            $manager->persist($korisnik);
        }

        $manager->flush();
    }
}