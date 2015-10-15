<?php

namespace GSB\Domain;

class Rapport
{
	private id;

	private nom;

	private prenom;
	
	private adresse;
	
	private CP;
	
	private ville;
	
	private secteur;
	
	private nomLabo
	
	

	public function getId() {
        return $this->id;
    }

    public function getNom(){
    	return $this->nom;
    }

    public function getAdresse(){
    	return $this->adresse;
    }

	public function getCP() {
        return $this->CP;
    }
	
		public function getVille() {
        return $this->ville;
    }

    public function getNomLabo(){
    	return $this->nomLabo;
    }


}