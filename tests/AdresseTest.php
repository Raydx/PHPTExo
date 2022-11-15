<?php

use PHPUnit\Framework\TestCase;

require_once 'src/metier/Adresse.php';

class AdresseTest extends TestCase
{
    private $adresse;

    public function setUp(): void
    {
        parent::setUp();
        // TODO Auto-generated PersonneTest::setUp()
        $this->adresse = new Adresse(
            3,
            4,
            "rue de saint honoré",
            44000,
            "Nantes"
        );
    }
    public function tearDown(): void
    {
        // TODO Auto-generated PersonneTest::tearDown()
        $this->adresse = null;
        parent::tearDown();
    }

    // TESTS GETTERS
    public function testGetId()
    {
        $this->assertEquals(3, $this->adresse->getId());
    }
    public function testGetNumero()
    {
        $this->assertEquals("4", $this->adresse->getNumero());
    }
    public function testGetRue()
    {
        $this->assertEquals("rue de saint honoré", $this->adresse->getRue());
    }
    public function testGetCodePostal()
    {
        $this->assertEquals("44000", $this->adresse->getCodePostal());
    }
    public function testGetVille()
    {
        $this->assertEquals("Nantes", $this->adresse->getVille());
    }
    // TEST SETTERS
    public function testSetId()
    {
        $this->adresse->setId(5);
        $this->assertEquals(5, (int)$this->adresse->getId());
    }
    public function testSetNumero()
    {
        $this->adresse->setNumero(8);
        $this->assertEquals(8, (int)$this->adresse->getNumero());
    }
    public function testSetRue()
    {
        $this->adresse->setRue("rue du lycee lesage");
        $this->assertEquals("rue du lycee lesage", $this->adresse->getRue());
    }
    public function testSetCodePostal()
    {
        $this->adresse->setCodePostal(56000);
        $this->assertEquals(56000, (int)$this->adresse->getCodePostal());
    }
    public function testSetVille()
    {
        $this->adresse->setVille("Vannes");
        $this->assertEquals("Vannes", $this->adresse->getVille());
    }
    public function test__toString()
    {
        $this->assertEquals($this->adresse->getNumero() . "," . $this->adresse->getRue() . "," . $this->adresse->getCodePostal() . "," . $this->adresse->getVille(), $this->adresse->__toString());
    }
}