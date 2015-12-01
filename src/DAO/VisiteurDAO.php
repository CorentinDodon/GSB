<?php

namespace GSB\DAO;

use GSB\Domain\Visiteur;

class VisiteurDAO extends DAO
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
	public function findAllAsArray()
    {
    	$sql = 'SELECT id, nom, prenom FROM employe ORDER BY nom ASC';
    	$result = $this->db->prepare($sql);
    	$result->execute();
    	$result = $result->fetchAll();
    	$visiteurs = array();

    	foreach ($result as $row) {
    		$id 				= $row['id'];
    		$visiteurs[$id]	= $row['nom'] .' '. $row['prenom'];
    	}

    	return $visiteurs;
    }
	
	 public function find($id) {
        $sql = 'SELECT * FROM employe WHERE id= '.$id;
        $row = $this->db->prepare($sql);
        $row->execute();
        $row = $this->db->fetchAssoc($sql, array($id));

        return $this->buildVisiteur($row);
    }
	
	public function findSecteur($id) {
        $sql = 'SELECT nom from secteur where id ='.$id;
        $row = $this->db->prepare($sql);
        $row->execute();
        $row = $this->db->fetchAssoc($sql, array($id));
        return $row;
    }

    protected function buildVisiteur(array $row) {

        $visiteur = new visiteur();

        $visiteur->setId($row['id']);
		
		$visiteur->setNom($row['nom']);
		
		$visiteur->setPrenom($row['prenom']);
		
		$visiteur->setAdresse($row['adresse']);
		
		$visiteur->setCP($row['CP']); 
		
		$visiteur->setVille($row['ville']);
		
		$visiteur->setIdSecteur($row['id_Secteur']);
		
		
		
		return $visiteur;

    }
	
}