<?php

namespace GSB\DAO;

use GSB\Domain\Visiteur;

class MedicamentsDAO extends DAO
{
	// Recherche les donnée dans la BDD 
    public function findAllVisiteur() {
	    $sql = "select * from employe order by id asc";
	    $result = $this->db->fetchAll($sql);

	    // Convert query result to an array of domain objects
	    $praticiens = array();
	    foreach ($result as $row) {
	        $visiteurId = $row['id'];
			$visiteur[$visiteurId] = $this->buildVisiteur($row);
	    }
	    return $visiteur;

    }
	public function NomComplet(){
		$sql = "select CONCAT(`nom`," ", `prenom`) from employe order by id asc";
		$result = $this->db->fetchAll($sql);
	}

    private function buildVisiteur(array $row) {

        $visiteur = new visiteur();

        $visiteur->setId($row['id']);

        $visiteur->setNom($row['nom']);
		
		$visiteur->setAdresse($row['adresse']);
		
		$visiteur->setCP($row['CP']); 
		
		$visiteur->setVille($row['ville']);
		
		$visiteur->setSecteur($row['secteur']);
		
		$visiteur->setgetNomLabo($row['nomLabo']);
		
		return $visiteur;

    }
}