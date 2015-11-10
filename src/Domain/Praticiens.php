<?php

namespace GSB\Domain;

class Praticiens 
{
    private $id;

    private $nom;

    private $prenom;

    private $adresse;

    private $CP;

    private $ville;

    private $coefNotoriete;

    private $coefConfiance;

    private $idType;

    public function getId() {
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    
    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function getAdresse(){
        return $this->adresse;
    }

    public function setAdresse($adresse){
        $this->adresse = $adresse;
    }

    public function getCP(){
        return $this->CP;
    }

    public function setCP($CP){
        $this->CP = $CP;
    }

    public function getVille(){
        return $this->ville;
    }

    public function setVille($ville){
        $this->ville = $ville;
    }

    public function getCoefNotoriete(){
        return $this->coefNotoriete;
    }

    public function setCoefNotoriete($coefNotoriete){
        $this->coefNotoriete = $coefNotoriete;
    }

    public function getCoefConfiance(){
        return $this->coefConfiance;
    }

    public function setCoefConfiance($coefConfiance){
        $this->coefConfiance = $coefConfiance;
    }

    public function getIdType(){
        return $this->idType;
    }

    public function setIdType($idType){
        $this->idType = $idType;
    }
}