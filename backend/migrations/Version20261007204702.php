<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261007204702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE materijal (id INT AUTO_INCREMENT NOT NULL, naziv_materijala VARCHAR(50) NOT NULL, cena_bez_pdv DOUBLE PRECISION NOT NULL, stanje DOUBLE PRECISION NOT NULL, jedinica_mere VARCHAR(50) NOT NULL, pdv_stopa_id INT NOT NULL, INDEX IDX_AFE48AECC93C6A16 (pdv_stopa_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE musterija (id INT AUTO_INCREMENT NOT NULL, pib VARCHAR(9) NOT NULL, naziv_firme VARCHAR(50) NOT NULL, vrsta_materijala VARCHAR(50) NOT NULL, potrebna_kolicina DOUBLE PRECISION NOT NULL, jedinica_mere VARCHAR(50) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE narudzbenica (id INT AUTO_INCREMENT NOT NULL, datum DATETIME NOT NULL, ukupna_kolicina DOUBLE PRECISION NOT NULL, ukupna_cena_bez_pdv DOUBLE PRECISION NOT NULL, ukupna_cena_sa_pdv DOUBLE PRECISION NOT NULL, musterija_id INT NOT NULL, INDEX IDX_83A98DC3F7732B9D (musterija_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE pdv_stopa (id INT AUTO_INCREMENT NOT NULL, osnov_za_primenu VARCHAR(50) NOT NULL, iznos DOUBLE PRECISION NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE stavka_narudzbenice (id INT AUTO_INCREMENT NOT NULL, redni_br INT NOT NULL, kolicina DOUBLE PRECISION NOT NULL, popust DOUBLE PRECISION NOT NULL, valuta VARCHAR(3) NOT NULL, iznos_bez_pdv DOUBLE PRECISION NOT NULL, iznos_sa_pdv DOUBLE PRECISION NOT NULL, materijal_id INT NOT NULL, narudzbenica_id INT NOT NULL, INDEX IDX_E7170BBDA0B2BAFB (materijal_id), INDEX IDX_E7170BBDD48F10E0 (narudzbenica_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE materijal ADD CONSTRAINT FK_AFE48AECC93C6A16 FOREIGN KEY (pdv_stopa_id) REFERENCES pdv_stopa (id)');
        $this->addSql('ALTER TABLE narudzbenica ADD CONSTRAINT FK_83A98DC3F7732B9D FOREIGN KEY (musterija_id) REFERENCES musterija (id)');
        $this->addSql('ALTER TABLE stavka_narudzbenice ADD CONSTRAINT FK_E7170BBDA0B2BAFB FOREIGN KEY (materijal_id) REFERENCES materijal (id)');
        $this->addSql('ALTER TABLE stavka_narudzbenice ADD CONSTRAINT FK_E7170BBDD48F10E0 FOREIGN KEY (narudzbenica_id) REFERENCES narudzbenica (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materijal DROP FOREIGN KEY FK_AFE48AECC93C6A16');
        $this->addSql('ALTER TABLE narudzbenica DROP FOREIGN KEY FK_83A98DC3F7732B9D');
        $this->addSql('ALTER TABLE stavka_narudzbenice DROP FOREIGN KEY FK_E7170BBDA0B2BAFB');
        $this->addSql('ALTER TABLE stavka_narudzbenice DROP FOREIGN KEY FK_E7170BBDD48F10E0');
        $this->addSql('DROP TABLE materijal');
        $this->addSql('DROP TABLE musterija');
        $this->addSql('DROP TABLE narudzbenica');
        $this->addSql('DROP TABLE pdv_stopa');
        $this->addSql('DROP TABLE stavka_narudzbenice');
    }
}
