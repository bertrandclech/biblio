<?php
require_once 'bdd/dataBase.php';
/**
 * ADVERT Manager
 */
class AbonneManager extends BDD {

	/**
	 * [Connecteur de BDD]
	 * @var PDO
	 */
	private $bdd;

	// Constructeur de la classe et récupération du connecteur de BDD
	// On peut l'utiliser directement mais de cette manière si un changement d'héritage
	// il ne faudra pas reécrire toutes les méthodes
	public function __construct() { $this->bdd = $this->pdo(); }

	/**
	 * [Save an Abonne in Db]
	 * @param Abonne $abonne
	 */
	public function add(Abonne $abonne) {
		// Préparation de la requête
		$add_abonne = $this->bdd->prepare('INSERT INTO abonne(	abonne.`nom`,
																abonne.`prenom`)
										   VALUES (:nom, :prenom);');
		// On associe une valeur aux différents marqueurs de la requête
		$add_abonne->bindValue(':nom', $abonne->getNom(), PDO::PARAM_STR);
		$add_abonne->bindValue(':prenom', $abonne->getPrenom(), PDO::PARAM_STR);
		// Exécution de la requête
		$add_abonne->execute();
		// Retourne soit FALSE en cas d'erreur, soit le numéro de l'Id de l'annonce
        return $this->bdd->lastInsertId();
	
}




	/**
	 * [Update an Abonne in Db]
	 * @param Abonne $abonne
	 * @return boolean
	 */
	public function update(Abonne $abonne) {
		// Préparation de la requête
		$update_abonne = $this->bdd->prepare(' UPDATE `abonne` SET 	abonne.`nom` = :nom,
																  	abonne.`prenom` = :prenom,
																  WHERE abonne.`id_abonne` = :id_abonne;');
		// On associe une valeur aux différents marqueurs de la requête
		$update_abonne->bindValue(':nom', $abonne->getTitle(), PDO::PARAM_STR);
		$update_abonne->bindValue(':prenom', $abonne->getDescription(), PDO::PARAM_STR);
		// Exécution de la requête
		$update_abonne->execute();
		// Retourne soit FALSE en cas d'erreur, doit le nombre de lignes affectés par la requète
        return $update_abonne->rowCount();
	}

	/**
	 * [Delete an abonne in Db]
	 * @param Abonne $abonne
	 * @return boolean
	 */
	public function delete(Abonne $abonne) {
        $delete_abonne = $this->bdd->prepare("DELETE FROM abonne WHERE abonne.`id_abonne` = :id");
        $delete_abonne->bindValue(':id', $abonne->getId_abonne(), PDO::PARAM_INT);
        $delete_abonne->execute();
        $delete_abonne->closeCursor();
        return ($delete_abonne->rowCount());
	}


}