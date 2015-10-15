<?php

namespace GSB\Domain;

class Rapport
{
	//variable privée
	private id;

	private nom;

	private prenom;
	
	private adresse;
	
	private CP;
	
	private ville;
	
	private secteur;
	
	private nomLabo;
	
	//getters
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
	
	public function getSecteur(){
		return $this->secteur
	}
	
	public function getNomLabo(){
    	return $this->nomLabo;
    }
	
	//setters
	 public function setId($id){
    	$this->id = $id;
    }
	
	public function setNom($nom){
		$this->nom = $nom; 
	}
	
	public function setAdresse($Adresse){
		$this->adresse = $adresse; 
	}
	
	public function setCP ($CP){
		$this->CP = $CP;
	}
	
	public function setVille($ville){
		$this->ville = $ville;
	}
	
	public function setSecteur($secteur){
		$this->secteur = $secteur;
	}
	
	public function setNomLabo($nomLabo){
		$this->nomLabo = $nomLabo;
	}

}