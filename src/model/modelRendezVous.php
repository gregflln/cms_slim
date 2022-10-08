<?php

namespace App\Model;

use App\Model\Model;

class ModelRendezVous extends Model
{
        
        public function __construct()
        {
            parent::__construct();
        }

        public function all(): array
        {
            $query = $this->db->query('SELECT * FROM rendezvous');
            $query->setFetchMode(\PDO::FETCH_ASSOC);
            return $query->fetchAll();
        }

        public function find(int $id) : array
        {
            $query = $this->db->prepare('SELECT * FROM rendezvous WHERE id = :id');
            $query->execute(['id' => $id]);
            $query->setFetchMode(\PDO::FETCH_ASSOC);
            return $query->fetch();
        }

        public function create(array $data): void
        {
            $query = $this->db->prepare('
            INSERT INTO `rendezvous` (
                beneficiaire,
                date,
                motif,
                duree
            ) VALUES (
                :beneficiaire,
                :date,
                :motif,
                :duree
            )
            ');
            var_dump($data);
            //bind param with SQL types
            $query->bindParam(':beneficiaire', $data['beneficiaire'], \PDO::PARAM_INT);
            $query->bindParam(':date', $data['date'], \PDO::PARAM_STR);
            $query->bindParam(':motif', $data['motif'], \PDO::PARAM_STR);
            $query->bindParam(':duree', $data['duree'], \PDO::PARAM_INT);

            $query->execute();

        }

        public function update(int $id, array $data): void
        {
            $query = $this->db->prepare('
            UPDATE rendezvous SET
                beneficiaire = :beneficiaire,
                date = :date,
                motif = :motif,
                duree = :duree
            WHERE id = :id
            ');

            $query->bindParam(':beneficiaire', $data['beneficiaire'], \PDO::PARAM_INT);
            $query->bindParam(':date', $data['date'], \PDO::PARAM_STR);
            $query->bindParam(':motif', $data['motif'], \PDO::PARAM_STR);
            $query->bindParam(':duree', $data['duree'], \PDO::PARAM_INT);
            $query->bindParam(':id', $id, \PDO::PARAM_INT);

            $query->execute();
        }
        public function delete(int $id): void
        {
            $query = $this->db->prepare('DELETE FROM rendezvous WHERE id = :id');
            $query->execute(['id' => $id]);
        }
}