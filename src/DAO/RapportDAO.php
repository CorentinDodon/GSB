<?php

namespace GSB\DAO;

use GSB\Domain\Rapport;

class RapportDAO extends DAO
{
    public function findAll() {
	    $sql = "SELECT id, P.nom, dateRap, bilan, M.nom
					FROM Praticien P, Rapport R,Motif M
					WHERE P.id = R.id_Praticien
					AND R.id_motif = M.id
					ORDER BY id ";
	    $result = $this->getDb()->fetchAll($sql);

	    // Convert query result to an array of domain objects
	    $rapports = array();
	    foreach ($result as $row) {
	        $rapportId = $row['id'];
	        $rapports[$rapportId] = $this->buildRapport($row);
	    }
	    return $rapports;

	    dump($rapports);
		
    }
		
	    protected function buildRapport($row) {
        $rapport= new Rapport();
        $rapport->setId($row['id']);
        $rapport->setUsername($row['P.nom']);
        $rapport->setPassword($row['dateRap']);
        $rapport->setSalt($row['bilan']);
        $rapport->setRole($row['M.nom']);
        return $rapport;
    }
}