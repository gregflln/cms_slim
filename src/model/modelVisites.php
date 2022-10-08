<?php

namespace App\Model;

use App\Model\Model;

class ModelVisites extends Model
{  
            public function __construct()
            {
                parent::__construct();
            }
    
            public function all(): array
            {
                $query = $this->db->query('SELECT * FROM visites');
                $query->setFetchMode(\PDO::FETCH_ASSOC);
                return $query->fetchAll();
            }
    
            public function find(int $id) : array
            {
                $query = $this->db->prepare('SELECT * FROM visites WHERE id = :id');
                $query->execute(['id' => $id]);
                $query->setFetchMode(\PDO::FETCH_ASSOC);
                return $query->fetch();
            }
    
            public function create(array $data): void
            {
                $query = $this->db->prepare('
                INSERT INTO visites (
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
                $query->execute([
                    'beneficiaire' => $data['beneficiaire'],
                    'date' => $data['date'],
                    'motif' => $data['motif'],
                    'duree' => $data['duree'],
                ]);
            }
    
            public function update(int $id, array $data): void
            {
                $query = $this->db->prepare('
                UPDATE visites SET
                    beneficiaire = :beneficiaire,
                    date = :date,
                    motif = :motif,
                    duree = :duree
                WHERE id = :id
                ');
                $query->execute([
                    'id' => $id,
                    'beneficiaire' => $data['beneficiaire'],
                    'date' => $data['date'],
                    'motif' => $data['motif'],
                    'duree' => $data['duree']
                ]);
            }
    
            public function delete(int $id): void
            {
                $query = $this->db->prepare('DELETE FROM visites WHERE id = :id');
                $query->execute(['id' => $id]);
            }
}