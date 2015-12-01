<?php

namespace GSB\Domain;

class Visiteur
{
	//variable privée
	private $id;

	private $nom;

	private $prenom;
	
	private $adresse;
	
	private $CP;
	
	private $ville;
	
	private $idSecteur;
	
	
	
	//getters
	public function getId() {
        return $this->id;
    }

    public function getNom(){
    	return $this->nom;
    }
	
	public function getPrenom(){
    	return $this->prenom;
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
	
	public function getIdSecteur(){
		return $this->idSecteur;
	}
	
	
	
	//setters
	 public function setId($id){
    	$this->id = $id;
    }
	
	public function setNom($nom){
		$this->nom = $nom; 
	}
	
	public function setPrenom($prenom){
		$this->prenom = $prenom; 
	}
	
	public function setAdresse($adresse){
		$this->adresse = $adresse; 
	}
	
	public function setCP ($CP){
		$this->CP = $CP;
	}
	
	public function setVille($ville){
		$this->ville = $ville;
	}
	
	public function setIdSecteur($idSecteur){
		$this->idSecteur = $idSecteur;
	}
	
	

}