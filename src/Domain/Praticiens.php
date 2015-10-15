<?php

namespace GSB\Domain;

class Praticien 
{
	private id;

	private nom;

	private prenom;

	public function getId() {
        return $this->id;
    }

    public function getNom(){
    	return $this->nom;
    }

    public function getPrenom(){
    	return $this->prenom;
    }

    

}