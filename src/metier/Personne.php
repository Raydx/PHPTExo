<?php

class Personne
{
    private $Adresse;
    private int $id;
    private ?string $nom;
    private ?string $prenom;
    private DateTime $datenaiss;
    private string $telephone;
    private string $email;
    private string $login;
    private string $pwd;


    function __construct(int $id, string $nom, string $prenom, DateTime $datenaiss, string $telephone, string $email, string $login, string $pwd)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->datenaiss = $datenaiss;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->login = $login;
        $this->pwd = $pwd;
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
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }
    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }
    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }
    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }
    /**
     * @return DateTime
     */
    public function getDatenaiss(): DateTime
    {
        return $this->datenaiss;
    }
    /**
     * @param DateTime $datenaiss
     */
    public function setDatenaiss(DateTime $datenaiss): void
    {
        $this->datenaiss = $datenaiss;
    }
    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }
    /**
     * @param string $telephone
     */
    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }
    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }
    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }
    /**
     * @return string
     */
    public function getPwd(): string
    {
        return $this->pwd;
    }
    /**
     * @param string $pwd
     */
    public function setPwd(string $pwd): void
    {
        $this->pwd = $pwd;
    }
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->nom},{$this->prenom},{$this->datenaiss->format('d/m/Y')},{$this->telephone},{$this->email},{$this->login},{$this->pwd}";
    }
}