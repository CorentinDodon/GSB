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

    public function findAllAsArray()
    {
    	$sql = 'SELECT id, nom, prenom FROM praticien ORDER BY nom ASC';
    	$result = $this->db->prepare($sql);
    	$result->execute();
    	$result = $result->fetchAll();
    	$praticiens = array();

    	foreach ($result as $row) {
    		$id 				= $row['id'];
    		$praticiens[$id]	= $row['nom'] .' '. $row['prenom'];
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