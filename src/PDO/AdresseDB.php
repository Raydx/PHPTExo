<?php
require_once "src/Constantes.php";
require_once "src/metier/Adresse.php";
/**
 *
 *Classe permettant d'acceder en bdd pour inserer supprimer
 * selectionner des objets Personne
 * @author pascal Lamy
 *
 */
class AdresseDB
{
    private $db; // Instance de PDO
    public function __construct($db)
    {
        $this->db = $db;
    }
    /**
     *
     * fonction d'Insertion de l'objet Personne en base de donnee
     * @param Adresse $a
     */
    public function ajout(Adresse $a): void
    {
        $q = $this->db->prepare('INSERT INTO adresse(numero,rue,codePostal,ville) values(:n,:r,:cp,:v)');
        $q->bindValue(':n', $a->getNumero());
        $q->bindValue(':r', $a->getRue());
        $q->bindValue(':cp', $a->getCodePostal());
        $q->bindValue(':v', $a->getVille());
        $q->execute();
        $q->closeCursor();
        $q = NULL;
    }
    public function delete(Adresse $a): int
    {
        $q = $this->db->prepare('DELETE FROM adresse WHERE id=:i');
        $q->bindValue(':i', $a->getId());
        $q->execute();
        $nb = $q->rowCount();
        $q->closeCursor();
        $q = NULL;
        return $nb;
    }
    public function update(Adresse $a): void
    {
        try {
            $q = $this->db->prepare('UPDATE adresse set numero=:n,rue=:r,codePostal=:cp,ville=:v WHERE id=:i');
            $q->bindValue(':i', $a->getId());
            $q->bindValue(':n', $a->getNumero());
            $q->bindValue(':r', $a->getRue());
            $q->bindValue(':cp', $a->getCodePostal());
            $q->bindValue(':v', $a->getVille());
            $q->execute();
            $q->closeCursor();
            $q = NULL;
        } catch (Exception $e) {
            throw new Exception(Constantes::EXCEPTION_DB_PERS_UP);
        }
    }

    public function selectionNumero($numero)
    {
        $query = 'SELECT id,numero,rue,codePostal,ville FROM adresse WHERE numero =:n';
        $q = $this->db->prepare($query);

        $q->bindValue(':n', $numero);
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
        $query = 'SELECT id,numero,rue,codePostal,ville FROM adresse WHERE id=:i';
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

        $addr = new Adresse($obj->id, $obj->numero, $obj->rue, $obj->codePostal, $obj->ville);
        return $addr;
    }
}