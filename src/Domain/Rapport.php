<?php

namespace GSB\Domain;

class Rapport
{
	private id;

	private dateRap;

	private bilan;
	
	private dateVisite;
	
	private id_Praticien;
	
	private id_Motif;
	
	

	public function getId() {
        return $this->id;
    }

    public function getDateRap(){
    	return $this->dateRap;
    }

    public function getBilan(){
    	return $this->bilan;
    }

	public function getDateVisite() {
        return $this->dateVisite;
    }
	
		public function getId_Praticien() {
        return $this->id_Praticien;
    }

    public function getId_Motif(){
    	return $this->id_Motif;
    }


}