<?php

namespace GSB\DAO;

use GSB\Domain\Motif;

class MotifDAO extends DAO
{
	public function findAllAsArray()
    {
    	$sql = 'SELECT id, nom FROM motif ORDER BY id DESC';
    	$result = $this->db->prepare($sql);
    	$result->execute();
    	$result = $result->fetchAll();
    	$motifs = array();

    	foreach ($result as $row) {
    		$id 				= $row['id'];
    		$motifs[$id]		= $row['nom'];
    	}

    	return $motifs;
    }
}