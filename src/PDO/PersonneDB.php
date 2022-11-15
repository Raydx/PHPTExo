<?php
require_once "src/Constantes.php";
require_once "src/metier/Personne.php";
/**
 *
 *Classe permettant d'acceder en bdd pour inserer supprimer
 * selectionner des objets Personne
 * @author pascal Lamy
 *
 */
class PersonneDB
{
    private $db; // Instance de PDO
    public function __construct($db)
    {
        $this->db = $db;
    }
    /**
     *
     * fonction d'Insertion de l'objet Personne en base de donnee
     * @param Personne $p
     */
    public function ajout(Personne $p): void
    {
        $q = $this->db->prepare('INSERT INTO personne(nom,prenom,datenaissance,telephone,email,login,pwd) values(:nom,:prenom,:datenaissance,:telephone,:email,:login,:pwd)');
        $q->bindValue(':nom', $p->getNom());
        $q->bindValue(':prenom', $p->getPrenom());
        $q->bindValue(':datenaissance', $p->getDatenaiss()->format('Y-m-d'));
        $q->bindValue(':telephone', $p->getTelephone());
        $q->bindValue(':email', $p->getEmail());
        $q->bindValue(':login', $p->getLogin());
        $q->bindValue(':pwd', $p->getPwd());
        $q->execute();
        $q->closeCursor();
        $q = NULL;
    }
    public function delete(Personne $p): int
    {
        $q = $this->db->prepare('DELETE FROM personne WHERE id=:i');
        $q->bindValue(':i', $p->getId());
        $q->execute();
        $nb = $q->rowCount();
        $q->closeCursor();
        $q = NULL;
        return $nb;
    }
    public function update(Personne $p): void
    {
        try {
            $q = $this->db->prepare('UPDATE personne set nom=:n,prenom=:p,datenaissance=:d,telephone=:t,email=:e,login=:l,pwd=:pwd WHERE id=:i');
            $q->bindValue(':i', $p->getId());
            $q->bindValue(':n', $p->getNom());
            $q->bindValue(':p', $p->getPrenom());
            $q->bindValue(':d', $p->getDatenaiss()->format('Y-m-d'));
            $q->bindValue(':t', $p->getTelephone());
            $q->bindValue(':e', $p->getEmail());
            $q->bindValue(':l', $p->getLogin());
            $q->bindValue(':pwd', $p->getPwd());
            $q->execute();
            $q->closeCursor();
            $q = NULL;
        } catch (Exception $e) {
            throw new Exception(Constantes::EXCEPTION_DB_PERS_UP);
        }
    }

    public function selectionNom($nom)
    {
        $query = 'SELECT id,nom,prenom,datenaissance,telephone,email,login,pwd FROM personne WHERE nom LIKE nom';
        $q = $this->db->prepare($query);

        $q->bindValue(':nom', $nom);
        $q->execute();

        $arrAll = $q->fetch(PDO::FETCH_ASSOC);

        if (empty($arrAll)) {
            throw new Exception(Constantes::EXCEPTION_DB_PERSONNE);
        }
        $q->closeCursor();
        $q = NULL;

        $res = $this->convertPdoPers($arrAll);
        return $res;
    }
    public function selectionId($id)
    {
        $query = 'SELECT id,nom,prenom,datenaissance,telephone,email,login,pwd FROM personne WHERE id=:i';
        $q = $this->db->prepare($query);

        $q->bindValue(':i', $id);
        $q->execute();

        $arrAll = $q->fetch(PDO::FETCH_ASSOC);

        if (empty($arrAll)) {
            throw new Exception(Constantes::EXCEPTION_DB_PERSONNE);
        }
        $q->closeCursor();
        $q = NULL;

        $res = $this->convertPdoPers($arrAll);
        return $res;
    }

    public function convertPdoPers($pdoPers)
    {
        if (empty($pdoPers)) {
            throw new Exception(Constantes::EXCEPTION_DB_CONVERT_PERS);
        }
        $obj = (object) $pdoPers;

        $dt = new DateTime($obj->datenaissance);
        $pers = new Personne($obj->id, $obj->nom, $obj->prenom, $dt, $obj->telephone, $obj->email, $obj->login, $obj->pwd);
        return $pers;
    }
}