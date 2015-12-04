<?php

namespace GSB\Domain;

class Medicaments 
{
	private $id;

	private $nom;

    private $composition;

    private $effets;

    private $contreindication;

    private $idFamille;

	public function getId() {
        return $this->id;
    }

    public function getNom(){
    	return $this->nom;
    }

     public function getComposition(){
        return $this->composition;
    }

     public function getContreindication(){
        return $this->contreindication;
    }

     public function getIdFamille(){
        return $this->idFamille;
    }

    public function setId($id){
    	$this->id = $id;
    }

    public function setNom($nom){
    	$this->nom = $nom;
    }

    public function setComposition(){
        return $this->composition;
    }

     public function setContreindication(){
        return $this->contreindication;
    }

     public function setIdFamille(){
        return $this->idFamille;
    }


}