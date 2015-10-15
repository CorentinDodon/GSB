<?php

namespace GSB\DAO;

use GSB\Domain\Praticiens;

class PraticienDAO extends DAO
{
    public function findAll() {
	    $sql = "select * from praticien order by id";
	    $result = $this->getDb()->fetchAll($sql);

	    // Convert query result to an array of domain objects
	    $praticiens = array();
	    foreach ($result as $row) {
	        $praticienId = $row['id'];
	        $praticiens[$praticienId] = $this->buildDomainObject($row);
	    }
	    return $praticiens;

	    dump($praticiens);
    }
}