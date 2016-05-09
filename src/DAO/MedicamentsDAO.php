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

    public function findAllAsArray()
    {
    	$sql = 'SELECT id, nom FROM medicament ORDER BY nom ASC';
    	$result = $this->db->prepare($sql);
    	$result->execute();
    	$result = $result->fetchAll();
    	$medicaments = array();

    	foreach ($result as $row) {
    		$id 				= $row['id'];
    		$medicaments[$id]	= $row['nom'];
    	}

    	return $medicaments;
    }
    
    public function findMedicamentByName($nom)
    {
        $sql = 'SELECT id from medicament where nom ="'.$nom.'"';
        $row = $this->db->prepare($sql);
        $row->execute();
        $row = $this->db->fetchAssoc($sql, array($nom));
        return $row;
    }

    private function buildMedicaments(array $row) {

        $medicament = new Medicaments();

        $medicament->setId($row['id']);

        $medicament->setNom($row['nom']);

        return $medicament;

    }
}