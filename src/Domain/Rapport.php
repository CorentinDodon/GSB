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

	private $echantillon2;

	private $echantillon3;

	private $echantillon4;

	private $echantillon5;

	private $echantillon6;

	private $echantillon7;

	private $echantillon8;

	private $echantillon9;

	private $echantillon10;
	
	

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

    public function getEchantillon2(){
    	return $this->echantillon2;
    }

    public function getEchantillon3(){
    	return $this->echantillon3;
    }

    public function getEchantillon4(){
    	return $this->echantillon4;
    }

    public function getEchantillon5(){
    	return $this->echantillon5;
    }

    public function getEchantillon6(){
    	return $this->echantillon6;
    }

	public function getEchantillon7(){
    	return $this->echantillon7;
    }

    public function getEchantillon8(){
    	return $this->echantillon8;
    }

	public function getEchantillon9(){
    	return $this->echantillon9;
    }

    public function getEchantillon10(){
    	return $this->echantillon10;
    }




}