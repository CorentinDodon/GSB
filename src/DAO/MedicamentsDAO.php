<?php

namespace GSB\DAO;

use GSB\Domain\Medicaments;

class MedicamentsDAO extends DAO
{
    public function findAll() {
	    $sql = "select * from medicament order by id asc";
	    $result = $this->db->fetchAll($sql);

	    // Convert query result to an array of domain objects
	    $medicaments = array();
	    foreach ($result as $row) {
	        $medicamentId = $row['id'];
	        $medicaments[$medicamentId] = $this->buildMedicaments($row);
	    }
	    return $medicaments;

    }

    public function find($id)
    {
        $sql = 'SELECT * FROM medicament WHERE medicament.id = '.$id;
        $result = $this->db->prepare($sql);
        $result->execute();
        $result = $this->db->fetchAssoc($sql, array($id));
        return $this->buildMedicaments($result);
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

    public function findFamilleMedic($id) {
        $sql = 'SELECT nom from famille where id ='.$id;
        $row = $this->db->prepare($sql);
        $row->execute();
        $row = $this->db->fetchAssoc($sql, array($id));
        return $row;
    }

    protected function buildMedicaments(array $row) {

        $medicament = new Medicaments();

        $medicament->setId($row['id']);

        $medicament->setNom($row['nom']);

        $medicament->setComposition($row['composition']);

        $medicament->setEffets($row['effets']);

        $medicament->setContreindication($row['contreindication']);

        $medicament->setIdFamille($row['id_Famille']);

        return $medicament;

    }
}