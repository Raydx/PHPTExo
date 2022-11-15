<?php

class Adresse
{
    private int $id;
    private int $numero;
    private ?string $rue;
    private ?int $codePostal;
    private ?string $ville;

    function __construct(int $id, int $numero, string $rue, int $codePostal, string $ville)
    {
        $this->id = $id;
        $this->numero = $numero;
        $this->rue = $rue;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    /**
     * @return int
     */
    public function getNumero(): int
    {
        return $this->numero;
    }
    /**
     * @param int $numero
     */
    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }
    /**
     * @return int
     */
    public function getCodePostal(): int
    {
        return $this->codePostal;
    }
    /**
     * @param int $codePostal
     */
    public function setCodePostal(int $codePostal): void
    {
        $this->codePostal = $codePostal;
    }
    /**
     * @return string
     */
    public function getRue(): string
    {
        return $this->rue;
    }
    /**
     * @param string $rue
     */
    public function setRue(string $rue): void
    {
        $this->rue = $rue;
    }
    /**
     * @return string
     */
    public function getVille(): string
    {
        return $this->ville;
    }
    /**
     * @param string $ville
     */
    public function setVille(string $ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->numero},{$this->rue},{$this->codePostal},{$this->ville}";
    }
}