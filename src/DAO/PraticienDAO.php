<?php

namespace GSB\DAO;

use GSB\Domain\Praticiens;

class PraticienDAO extends DAO
{
    public function findAll() {
	    $sql = "select * from praticien order by id asc";
	    $result = $this->db->fetchAll($sql);

	    // Convert query result to an array of domain objects
	    $praticiens = array();
	    foreach ($result as $row) {
	        $praticienId = $row['id'];
	        $praticiens[$praticienId] = $this->buildPraticiens($row);
	    }
	    return $praticiens;

    }

    private function buildPraticiens(array $row) {

        $praticien = new Praticiens();

        $praticien->setId($row['id']);

        $praticien->setNom($row['nom']);

        $praticien->setPrenom($row['prenom']);

        return $praticien;

    }
}