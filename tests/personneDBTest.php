<?php

use PHPUnit\Framework\TestCase;

require_once "src/Constantes.php";
include_once "src/PDO/connectionBDO.php";
require_once "src/metier/Personne.php";
require_once "src/PDO/PersonneDB.php";

class PersonneDBTest extends Testcase
{

    protected $personne;
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
            $this->personne = new PersonneDB($this->pdodb);
            $dt = new DateTime('1950-01-12');
            $p = new Personne(
                45,
                "Hollande",
                "Francois",
                $dt,
                "0656463524",
                "fhollande@free.fr",
                "fhollande",
                "monpwd"
            );
            $p->setPwd("monpwd");
            //insertion en bdd
            $this->personne->ajout($p);
            $pers = $this->personne->selectionNom($p->getNom());
            echo "pers bdd: $pers";
            $this->assertEquals($p->getNom(), $pers->getNom());
            $this->assertEquals($p->getPrenom(), $pers->getPrenom());
            $this->assertEquals($p->getTelephone(), $pers->getTelephone());
            $this->assertEquals($p->getEmail(), $pers->getEmail());
            $this->assertEquals($p->getLogin(), $pers->getLogin());
            $this->assertEquals($p->getPwd(), $pers->getPwd());
            $this->assertEquals($p->getDatenaiss()->format('Y-m-d'), $pers->getDatenaiss()->format('Y-m-d'));
        } catch (Exception $e) {
            echo 'Exception recue : ', $e->getMessage(), "\n";
        }
    }
    public function testUpdate()
    {
        try {
            $this->personne = new PersonneDB($this->pdodb);
            $dt = new DateTime('1950-01-12');
            $p = new Personne(
                6,
                "Marie",
                "Jeanne",
                $dt,
                "0134567891",
                "mjeanne@orange.fr",
                "mjeanne",
                "mdp"
            );
            echo $p;
            $p->setPwd("monpwd");
            //insertion en bdd
            echo ("TEST 0");
            $this->personne->update($p);
            echo ("TEST 1");
            $pers = $this->personne->selectionNom($p->getNom());
            echo ("TEST 2");
            echo "pers bdd: $pers";
            echo ("TEST 3");
            $this->assertEquals($p->getId(), $pers->getId());
            $this->assertEquals($p->getNom(), $pers->getNom());
            $this->assertEquals($p->getPrenom(), $pers->getPrenom());
            $this->assertEquals($p->getTelephone(), $pers->getTelephone());
            $this->assertEquals($p->getEmail(), $pers->getEmail());
            $this->assertEquals($p->getLogin(), $pers->getLogin());
            $this->assertEquals($p->getPwd(), $pers->getPwd());
            $this->assertEquals($p->getDatenaiss()->format('Y-m-d'), $pers->getDatenaiss()->format('Y-m-d'));
        } catch (Exception $e) {
            echo 'Exception recue : ', $e->getMessage(), "\n";
        }
    }
    public function testDelete()
    {
        try {
            $this->personne = new PersonneDB($this->pdodb);
            $dt = new DateTime('1950-01-12');
            $p = new Personne(
                10,
                "Hollande",
                "Francois",
                $dt,
                "0656463524",
                "fhollande@free.fr",
                "fhollande",
                "monpwd"
            );
            $p->setPwd("monpwd");
            //insertion en bdd
            $nb = $this->personne->delete($p);
            $this->assertEquals($nb, 1);
            echo $nb . ' lignes supprimées.';
        } catch (Exception $e) {
            echo 'Exception recue : ', $e->getMessage(), "\n";
        }
    }
}