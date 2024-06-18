<?php
// core/Manager.php

namespace Core;

use PDO;
use PDOException;

class Manager
{
    protected $db;

    public function __construct()
    {
        $config = include __DIR__ . '/../config/config.php';
        try {
            $this->db = new PDO(
                "mysql:host={$config['db']['host']};dbname={$config['db']['dbname']}",
                $config['db']['user'],
                $config['db']['password']
            );
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données: ' . $e->getMessage());
        }
    }

    // Méthode générique pour trouver un enregistrement par ID
    public function findById($table, $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM $table WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Méthode générique pour récupérer tous les enregistrements d'une table
    public function findAll($table)
    {
        $stmt = $this->db->query("SELECT * FROM $table");
        return $stmt->fetchAll();
    }

    // Méthode générique pour supprimer un enregistrement par ID
    public function deleteById($table, $id)
    {
        $stmt = $this->db->prepare("DELETE FROM $table WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
