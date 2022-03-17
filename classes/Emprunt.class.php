<?php

class Emprunt {


/*  PROPRIÉTÉS */

   /**
    * @var int
    */
   private $id_emprunt;

   /**
    * @var int
    */
   private $abonne_id;

   /**
    * @var int
    */
   private $livre_id;

   /**
    * @var date
    */
   private $date_emprunt;

   /**
    * @var date
    */
   private ?string $date_rendu;


/*  CONSTRUCTEUR DE LA CLASSE */

    public function __construct(array $data) {
       foreach ($data as $key => $value) {
          // On récupère le nom du setter correspondant à l'attribut
          $method = 'set'.ucfirst($key);
          // Si le setter correspondant existe on l'appelle
          if (method_exists($this, $method)) { $this->$method($value); }
      }
    }   


/*  GETTERS */

   /**
    * @return int
    */
   public function getId_emprunt() { return $this->id_emprunt; }

   /**
    * @return int
    */
   public function getAbonne_id() { return $this->abonne_id; }

   /**
    * @return int
    */
   public function getLivre_id() { return $this->livre_id; }

   /**
    * @return string
    */
   public function getDate_emprunt() { return $this->date_emprunt; }

   /**
    * @return string
    */
   public function getDate_rendu() { return $this->date_rendu; }
 

/*  SETTERS */        

   /**
    * @param int $id_emprunt
    */
   private function setId_emprunt(int $id_emprunt) { 
      $this->id_emprunt = $id_emprunt; 
   }

   /**
    * @param int $id_abonne
    */
   private function setAbonne_id(string $abonne_id) { 
      $this->abonne_id = $abonne_id; 
   }

   /**
    * @param int $id_livre
    */
   private function setLivre_id(string $livre_id) { 
      $this->livre_id = $livre_id; 
   }   

   /**
    * @param string $date_emprunt
    */
   private function setDate_emprunt(string $date_emprunt) { 
      $this->date_emprunt = $date_emprunt; 
   }  

   /**
    * @param string $date_rendu
    */
   private function setDate_rendu(?string $date_rendu) { 
      $this->date_rendu = $date_rendu; 
   }  

}    