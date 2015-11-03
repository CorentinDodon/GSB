<?php

namespace GSB\Domain;

class Motif
{
	private $id;

	private $nom;

	public function getId() {
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }
}