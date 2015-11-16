<?php

namespace GSB\Domain;

class Rapport
{
	private $id;

	private $dateRap;

	private $bilan;
	
	private $dateVisite;
	
	private $idPraticien;
	
	private $idMotif;

	private $echantillon;

	private $strEchantillon;

    private $idEmploye;
	
	

	public function getId() {
        return $this->id;
    }

    public function setId($id) {
    	$this->id = $id;
    }

    public function getDateRap(){
    	return $this->dateRap;
    }

    public function setDateRap($dateRap) {
        $this->dateRap = $dateRap;
    }

    public function getBilan(){
    	return $this->bilan;
    }

    public function setBilan($bilan) {
        $this->bilan = $bilan;
    }

	public function getDateVisite() {
        return $this->dateVisite;
    }

    public function setDateVisite($dateVisite) {
        $this->dateVisite = $dateVisite;
    }
	
	public function getIdPraticien() {
    	return $this->idPraticien;
    }

    public function setIdPraticien($idPraticien) {
        $this->idPraticien = $idPraticien;
    }

    public function getIdMotif(){
    	return $this->idMotif;
    }

    public function setIdMotif($idMotif) {
        $this->idMotif = $idMotif;
    }

    public function getEchantillon(){
    	return $this->echantillon;
    }

    public function setEchantillon($echantillon) {
        $this->echantillon = $echantillon;
    }

    public function getStrEchantillon(){
        return $this->strEchantillon;
    }

    public function setStrEchantillon($strEchantillon) {
        $this->strEchantillon = $strEchantillon;
    }   

    public function getIdEmploye() {
        return $this->idEmploye;
    }

    public function setIdEmploye($idEmploye) {
        $this->idEmploye = $idEmploye;
    } 

}