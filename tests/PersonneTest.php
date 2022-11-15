<?php

use PHPUnit\Framework\TestCase;

require_once 'src/metier/Personne.php';

class PersonneTest extends TestCase
{
    private $personne;

    public function setUp(): void
    {
        parent::setUp();
        // TODO Auto-generated PersonneTest::setUp()
        $date = '15/12/1950';
        $dt = DateTime::createFromFormat('d/m/Y', $date);
        $this->personne = new Personne(
            49,
            "Hollande",
            "Francois",
            $dt,
            "0656463524",
            "fhollande@free.fr",
            "fhollande",
            "monpwd"
        );
    }
    /**
     * Cleans up the environment after running a test.
     */
    public function tearDown(): void
    {
        // TODO Auto-generated PersonneTest::tearDown()
        $this->personne = null;
        parent::tearDown();
    }

    public function testGetId()
    {
        $this->assertEquals("49", $this->personne->getId());
    }
    public function testGetNom()
    {
        $this->assertEquals("Hollande", $this->personne->getNom());
    }
    public function testGetPrenom()
    {
        $this->assertEquals("Francois", $this->personne->getPrenom());
    }
    public function testGetDatenaissance()
    {
        $dateF = '15/12/1950';
        $dateFR = DateTime::createFromFormat('d/m/Y', $dateF);
        $this->assertEquals($dateFR, $this->personne->getDatenaiss());
    }
    public function testGetTelephone()
    {
        $this->assertEquals("0656463524", $this->personne->getTelephone());
    }
    public function testGetEmail()
    {
        $this->assertEquals("fhollande@free.fr", $this->personne->getEmail());
    }
    public function testGetLogin()
    {
        $this->assertEquals("fhollande", $this->personne->getLogin());
    }
    public function testGetPwd()
    {
        $this->assertEquals(("monpwd"), $this->personne->getPwd());
    }
    public function testSetId()
    {
        $this->personne->setId(5);
        $this->assertEquals(5, (int)$this->personne->getId());
    }
    public function testSetNom()
    {
        $this->personne->setNom("Macron");
        $this->assertEquals("Macron", $this->personne->getNom());
    }
    public function testSetPrenom()
    {
        $this->personne->setPrenom("Emmanuel");
        $this->assertEquals("Emmanuel", $this->personne->getPrenom());
    }
    public function testSetDateNaissance()
    {
        $dateF = '15/12/1980';
        $dateFR = DateTime::createFromFormat('d/m/Y', $dateF);
        $this->personne->setDateNaiss($dateFR);
        $this->assertEquals($dateFR, $this->personne->getDatenaiss());
    }
    public function testSetTelephone()
    {
        $this->personne->setTelephone("0102030405");
        $this->assertEquals("0102030405", $this->personne->getTelephone());
    }
    public function testSetEmail()
    {
        $this->personne->setEmail("emacron@free.Fr");
        $this->assertEquals("emacron@free.Fr", $this->personne->getEmail());
    }
    public function testSetLogin()
    {
        $this->personne->setLogin("emacron");
        $this->assertEquals("emacron", $this->personne->getLogin());
    }
    public function testSetPwd()
    {
        $this->personne->setPwd("brigitte");
        $this->assertEquals(("brigitte"), $this->personne->getPwd());
    }
    public function test__toString()
    {
        $this->assertEquals($this->personne->getNom() . "," . $this->personne->getPrenom() . "," . $this->personne->getDatenaiss()->format('d/m/Y') . "," . $this->personne->getTelephone() . "," . $this->personne->getEmail() . "," . $this->personne->getLogin() . "," . $this->personne->getPwd(), $this->personne->__toString());
    }
}