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

    public function getEffets(){
        return $this->effets;
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

    public function setComposition($composition){
        $this->composition = $composition;
    }

    public function setEffets($effets){
        $this->effets = $effets;
    }

    public function setContreindication($contreindication){
        $this->contreindication = $contreindication;
    }

    public function setIdFamille($idFamille){
        $this->idFamille = $idFamille;
    }




}