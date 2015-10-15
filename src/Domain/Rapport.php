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
	
	
	/*
	*GETTEURS
	*/
	
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
	
	

	/*
	*SETTEURS
	*/
	
	public function setId($id) {
        $this->id = $id;
    }
	
	public function setDateRap($DateRap) {
        $this->id = $DateRap;
    }
	
		public function setbilan($bilan) {
        $this->id = $bilan;
    }
	
	public function setDateRap($DateRap) {
        $this->id = $DateRap;
    }
		public function setDateVisite($dateVisite) {
        $this->id = $dateVisite;
    }
	
	public function setId_Praticien($id_Praticien) {
        $this->id = $id_Praticien;
    }
	
	public function setId_Motif($id_Motif) {
        $this->id = $id_Motif;
    }
	
}