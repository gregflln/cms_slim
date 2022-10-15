<?php

namespace App\Model;

use App\Model\Model;

class ModelBeneficiaire extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    //crud actions define in interface, return Beneficiaire object
    public function all(): array
    {
        $query = $this->db->query('SELECT * FROM beneficiaires');
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        return $query->fetchAll();
    }
    public function find(int $id) : array
    {
        $query = $this->db->prepare('SELECT * FROM beneficiaires WHERE id = :id');
        $query->execute(['id' => $id]);
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        return $query->fetch();
    }
    public function create(array $data): void
    {
        $query = $this->db->prepare('
        INSERT INTO beneficiaires (
            nom,
            prenom,
            date_naissance,
            adresse,
            code_postal,
            ville,
            telephone,
            email,
            age,
            date_inscription,
            nombre_enfant,
            partenaires,
            secteur,
            sante,
            niveau_etude,
            situation_professionnelle

        ) VALUES
        (
            :nom,
            :prenom,
            :date_naissance,
            :adresse,
            :code_postal,
            :ville,
            :telephone,
            :email,
            :age,
            :date_inscription,
            :nombre_enfant,
            :partenaires,
            :secteur,
            :sante,
            :niveau_etude,
            :situation_professionnelle
        )
        ');

        //calcule age
        $date_naissance = $data['date_naissance'];
        $date = new \DateTime($date_naissance);
        $now = new \DateTime();
        $interval = $now->diff($date);
        $age = $interval->y;

        //bind all values with PARAM_ type
        $query->bindValue(':nom', $data['nom'], \PDO::PARAM_STR);
        $query->bindValue(':prenom', $data['prenom'], \PDO::PARAM_STR);
        $query->bindValue(':date_naissance', $data['date_naissance'], \PDO::PARAM_STR);
        $query->bindValue(':adresse', $data['adresse'], \PDO::PARAM_STR);
        $query->bindValue(':code_postal', $data['code_postal'], \PDO::PARAM_STR);
        $query->bindValue(':ville', $data['ville'], \PDO::PARAM_STR);
        $query->bindValue(':telephone', $data['telephone'], \PDO::PARAM_STR);
        $query->bindValue(':email', $data['email'], \PDO::PARAM_STR);
        $query->bindValue(':age', $age, \PDO::PARAM_INT);
        $query->bindValue(':date_inscription', $data['date_inscription'], \PDO::PARAM_STR);
        $query->bindValue(':nombre_enfant', $data['nombre_enfant'], \PDO::PARAM_INT);
        $query->bindValue(':partenaires', $data['partenaires'], \PDO::PARAM_INT);
        $query->bindValue(':secteur', $data['secteur'], \PDO::PARAM_INT);
        $query->bindValue(':sante', $data['sante'], \PDO::PARAM_INT);
        $query->bindValue(':niveau_etude', $data['niveau_etude'], \PDO::PARAM_INT);
        $query->bindValue(':situation_professionnelle', $data['situation_professionnelle'], \PDO::PARAM_INT);

        //execute query
        $query->execute();
    }
    public function update(int $id, array $data): void
    {
        //update query
        $query = $this->db->prepare('
        UPDATE beneficiaires SET
            nom = :nom,
            prenom = :prenom,
            date_naissance = :date_naissance,
            adresse = :adresse,
            code_postal = :code_postal,
            ville = :ville,
            telephone = :telephone,
            email = :email,
            age = :age,
            date_inscription = :date_inscription,
            nombre_enfant = :nombre_enfant,
            partenaires = :partenaires,
            secteur = :secteur,
            sante = :sante,
            niveau_etude = :niveau_etude,
            situation_professionnelle = :situation_professionnelle
        WHERE id = :id
        ');

        //calcule age
        $date_naissance = $data['date_naissance'];
        $date = new \DateTime($date_naissance);
        $now = new \DateTime();
        $interval = $now->diff($date);
        $age = $interval->y;
        //

        //bind id value
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        //bind all values with PARAM_ type
        $query->bindValue(':nom', $data['nom'], \PDO::PARAM_STR);
        $query->bindValue(':prenom', $data['prenom'], \PDO::PARAM_STR);
        $query->bindValue(':date_naissance', $data['date_naissance'], \PDO::PARAM_STR);
        $query->bindValue(':adresse', $data['adresse'], \PDO::PARAM_STR);
        $query->bindValue(':code_postal', $data['code_postal'], \PDO::PARAM_STR);
        $query->bindValue(':ville', $data['ville'], \PDO::PARAM_STR);
        $query->bindValue(':telephone', $data['telephone'], \PDO::PARAM_STR);
        $query->bindValue(':email', $data['email'], \PDO::PARAM_STR);
        $query->bindValue(':age', $age, \PDO::PARAM_INT);
        $query->bindValue(':date_inscription', $data['date_inscription'], \PDO::PARAM_STR);
        $query->bindValue(':nombre_enfant', $data['nombre_enfant'], \PDO::PARAM_INT);
        $query->bindValue(':partenaires', $data['partenaires'], \PDO::PARAM_INT);
        $query->bindValue(':secteur', $data['secteur'], \PDO::PARAM_INT);
        $query->bindValue(':sante', $data['sante'], \PDO::PARAM_INT);
        $query->bindValue(':niveau_etude', $data['niveau_etude'], \PDO::PARAM_INT);
        $query->bindValue(':situation_professionnelle', $data['situation_professionnelle'], \PDO::PARAM_INT);

        //execute query
        $query->execute();
    }
    public function delete(int $id): void
    {
        $query = $this->db->prepare('DELETE FROM beneficiaires WHERE id = :id');
        $query->execute(['id' => $id]);
    }
}