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

	    dump($rapports);
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
    		array(
    			'echantillon1'	=> $rapport->getEchantillon1(),
    			'echantillon2'	=> $rapport->getEchantillon2(),
    			'echantillon3'	=> $rapport->getEchantillon3(),
    			'echantillon4'	=> $rapport->getEchantillon4(),
    			'echantillon5'	=> $rapport->getEchantillon5(),
    			'echantillon6'	=> $rapport->getEchantillon6(),
    			'echantillon7'	=> $rapport->getEchantillon7(),
    			'echantillon8'	=> $rapport->getEchantillon8(),
    			'echantillon9'	=> $rapport->getEchantillon9(),
    			'echantillon10'	=> $rapport->getEchantillon10(),
    			),
    		);

    	for ($i = 1; $i < 10; $i++) {
    		if ($echantillonData[0]['echantillon'.$i] != null) {
    			$echantillon = array(
    				$echantillonData[0],
    				$echantillonData[1][$i],
    				);

    			$this->getDb()->insert('offrir',$echantillon);
    		}
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