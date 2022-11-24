<?php

use PHPUnit\Framework\TestCase;

require_once "src/Constantes.php";
include_once "src/PDO/connectionBDO.php";
require_once "src/metier/Adresse.php";
require_once "src/PDO/AdresseDB.php";

class AdresseDBTest extends Testcase
{

    protected $adresse;
    protected $pdodb;
    protected function setUp(): void
    {
        //parametre de connexion à la bae de donnée
        $strConnection =
            Constantes::TYPE . ':host=' . Constantes::HOST . ':3308' . ';dbname=' . Constantes::BASE;
        $arrExtraParam = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $this->pdodb = new PDO(
            $strConnection,
            Constantes::USER,
            Constantes::PASSWORD,
            $arrExtraParam
        ); //Ligne 3; Instancie la connexion
        $this->pdodb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    protected function tearDown(): void
    {
    }
    public function testAjout()
    {
        try {
            $this->adresse = new AdresseDB($this->pdodb);
            $a = new Adresse(
                1,
                56,
                "ceci est une rue",
                56000,
                "UneVille"
            );
            //insertion en bdd
            echo "STEP 1";
            $this->adresse->ajout($a);
            echo "STEP 2";
            $addr = $this->adresse->selectionNumero($a->getNumero());
            echo "STEP 3";
            echo "pers bdd: $addr";
            $this->assertEquals($a->getNumero(), $addr->getNumero());
            $this->assertEquals($a->getRue(), $addr->getRue());
            $this->assertEquals($a->getCodePostal(), $addr->getCodePostal());
            $this->assertEquals($a->getVille(), $addr->getVille());
            echo "STEP 4";
        } catch (Exception $e) {
            echo 'Exception recue : ', $e->getMessage(), "\n";
        }
    }
    public function testUpdate()
    {
        try {
            $this->adresse = new AdresseDB($this->pdodb);
            $a = new Adresse(
                5,
                44,
                "C'est une nouvelle adresse",
                44000,
                "Nantes"
            );
            echo $a;
            //insertion en bdd
            echo ("TEST 0");
            $this->adresse->update($a);
            echo ("TEST 1");
            $addr = $this->adresse->selectionNumero($a->getNumero());
            echo ("TEST 2");
            echo "pers bdd: $addr";
            echo ("TEST 3");
            $this->assertEquals($a->getId(), $addr->getId());
            $this->assertEquals($a->getNumero(), $addr->getNumero());
            $this->assertEquals($a->getRue(), $addr->getRue());
            $this->assertEquals($a->getCodePostal(), $addr->getCodePostal());
            $this->assertEquals($a->getVille(), $addr->getVille());
        } catch (Exception $e) {
            echo 'Exception recue : ', $e->getMessage(), "\n";
        }
    }
    public function testDelete()
    {
        try {
            $this->adresse = new AdresseDB($this->pdodb);
            $a = new Adresse(
                3,
                44,
                "C'est une nouvelle adresse",
                44000,
                "Nantes"
            );
            //insertion en bdd
            $nb = $this->adresse->delete($a);
            $this->assertEquals($nb, 1);
            echo $nb . ' lignes supprimées.';
        } catch (Exception $e) {
            echo 'Exception recue : ', $e->getMessage(), "\n";
        }
    }
}