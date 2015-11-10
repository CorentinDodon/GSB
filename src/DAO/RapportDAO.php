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
        $rapport->setIdEmploye($row['idEmploye']);
		$rapport->setIdPratician($row['idPraticien']);		
		$rapport->setIdMotif($row['idMotif']);			  
        return $rapport;
    }

}