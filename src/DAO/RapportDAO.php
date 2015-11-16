<?php

namespace GSB\DAO;

use GSB\Domain\Rapport;
use Silex\Application;
	

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
    }

    public function findMeAsArray(Application $app)
    {
        $id = $app['user']->getId();
        $sql = "SELECT rapport.id, rapport.dateRap, praticien.nom, praticien.prenom
                FROM rapport, praticien
                WHERE rapport.id_Praticien = praticien.id
                AND rapport.id_Employe = ".$id;

        $result = $this->getDb()->fetchAll($sql);
        $rapports = array();
        foreach ($result as $row) {
            $rapportId = $row['id'];
            $rapports[$rapportId] = $row['dateRap']. ' : '.$row['nom']. ' '.$row['prenom'];
        }
        return $rapports;

    }

    public function find($id)
    {
        $sql = "SELECT *
                FROM rapport
                WHERE id = " . $id;
        $row = $this->db->prepare($sql);
        $row->execute();
        $row = $this->db->fetchAssoc($sql, array($id));
      
        return $this->buildRapport($row);  
    }

    public function findPraticien($id)
    {
        $sql = 'SELECT nom, prenom from praticien where id ='.$id;
        $row = $this->db->prepare($sql);
        $row->execute();
        $row = $this->db->fetchAssoc($sql, array($id));
        return $row;
    }

    public function findMotif($id)
    {
        $sql = 'SELECT nom from motif where id ='.$id;
        $row = $this->db->prepare($sql);
        $row->execute();
        $row = $this->db->fetchAssoc($sql, array($id));
        return $row;
    }

    public function findEchantillon($id)
    {
        $sql = 'SELECT medicament.nom 
                from medicament,offrir 
                where medicament.id = offrir.id
                and offrir.id_Rapport = '.$id;
        $result = $this->db->prepare($sql);
        $result->execute();
        $result = $this->db->fetchAll($sql);
        $echantillons = ""; 
        foreach ($result as $row) {
            $echantillons = $echantillons. '  '. $row['nom'];
        }
        return $echantillons;
    }

    public function save(Rapport $rapport, Application $app){
    	$rapportData = array(
    		'dateRap'			=> $rapport->getDateRap()->format('Y-m-d'),
    		'dateVisite'		=> $rapport->getDateVisite()->format('Y-m-d'),
    		'id_Employe'		=> $app['user']->getId(),
    		'id_motif'			=> $rapport->getIdMotif(),
    		'bilan'				=> $rapport->getBilan(),
    		'id_Praticien'		=> $rapport->getIdPraticien(),
    		);

    	$this->getDb()->insert('rapport',$rapportData);

    	$id = $this->getDb()->lastInsertId();
    	$rapport->setId($id);

    	$echantillonData = array(
    		'n_rapport'		=> $rapport->getId(),
    		'strEch'        => $rapport->getStrEchantillon(),
    		);

    	$echantillons = explode(";",$echantillonData["strEch"]);
        
        for ($i = 1; $i < sizeof($echantillons); $i++){
            $aInserer = array(
                'quantite' => "1",
                'id' => $echantillons[$i],
                'id_Rapport' => $echantillonData['n_rapport'],   
            );
            $this->getDb()->insert('offrir',$aInserer);
        } 
    }
	
    protected function buildrapport($row) {
        $rapport = new rapport();
        $rapport->setId($row['id']);
        $rapport->setDateRap($row['dateRap']);
        $rapport->setBilan($row['bilan']);
        $rapport->setDateVisite($row['dateVisite']);
        $rapport->setIdEmploye($row['id_Employe']);
		$rapport->setIdPraticien($row['id_Praticien']);		
		$rapport->setIdMotif($row['id_motif']);			  
        return $rapport;
    }

}