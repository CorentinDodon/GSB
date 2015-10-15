<?php

namespace GSB\DAO;

use GSB\Domain\Medicaments;

class MedicamentsDAO extends DAO
{
    public function findAll() {
	    $sql = "select * from medicament order by id asc";
	    $result = $this->db->fetchAll($sql);

	    // Convert query result to an array of domain objects
	    $praticiens = array();
	    foreach ($result as $row) {
	        $medicamentId = $row['id'];
	        $medicaments[$medicamentId] = $this->buildMedicaments($row);
	    }
	    return $medicaments;

    }

    private function buildMedicaments(array $row) {

        $medicament = new Medicaments();

        $medicament->setId($row['id']);

        $medicament->setNom($row['nom']);

        return $medicament;

    }
}