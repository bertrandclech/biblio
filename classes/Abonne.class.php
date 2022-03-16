<?php

/**
 * Entity ADVERT
 */
class Abonne {

/*	PROPRIÉTÉS */

	/**
	 * @var int
	 */
	private $id_abonne;

	/**
	 * @var string
	 */
	private $nom;

	/**
	 * @var string
	 */
	private $prenom;

/*	CONSTRUCTEUR DE LA CLASSE */

	public function __construct(array $data) {
       foreach ($data as $key => $value) {
          // On récupère le nom du setter correspondant à l'attribut
          $method = 'set'.ucfirst($key);
          // Si le setter correspondant existe on l'appelle
          if (method_exists($this, $method)) { $this->$method($value); }
      }
    }	

/*	GETTERS */

   /**
    * @return int
    */
	public function getId_abonne() { 
		return $this->id_abonne; 
	}

	/**
	 * @return string
	 */
	public function getNom() { return $this->nom; }

	/**
	 * @return string
	 */
	public function getPrenom() { return $this->prenom; }

	/**
	 * @return string
	 */
	public function getPostcode() { return $this->postcode; }



/*	SETTERS */

	/**
	 * @param int $id_abonne
	 */
	private function setId_abonne(int $id_abonne) { 
		$this->id_abonne = $id_abonne; 
	}

	/**
	 * @param string $nom
	 */
	private function setNom(string $nom) { 
		$this->nom = $nom; 
	}

	/**
	 * @param string $prenom
	 */
	private function setPrenom(string $prenom) { 
		$this->prenom = $prenom; 
	}	
	

}	