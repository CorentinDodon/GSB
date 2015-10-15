<?php

namespace GSB\DAO;

use GSB\Domain\Rapport;

class RapportDAO extends DAO
{
    public function findAll() {
	    $sql = "	SELECT *
					FROM  Rapport 
					order by id ";
	    $result = $this->getDb()->fetchAll($sql);

	    // Convert query result to an array of domain objects
	    $rapports = array();
	    foreach ($result as $row) {
	        $rapportId = $row['id'];
	        $rapports[$RapportId] = $this->buildrapport($row);
	    }
	    return $rapports;

	    dump($rapports);
    }
	
    protected function buildrapport($row) {
        $rapport = new rapport();
        $rapport->setId($row['id']);
        $rapport-> setDateRap($row['dateRap']);
        $rapport->setBilan($row['bilan']);
        $rapport->setDateVisite($row['dateVisite']);
        $rapport->setId_Employe($row['id_Employe']);
		$rapport->setId_Pratician($row['id_Praticien']);		
		$rapport->setId_Motif($row['id_motif']);			  
        return $rapport;
}