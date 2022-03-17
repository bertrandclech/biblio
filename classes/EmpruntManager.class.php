<?php
require_once 'bdd/dataBase.php';

class EmpruntManager extends BDD {

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
	 * [Save an Advert in Db]
	 * @param Emprunt $emprunt
	 */
	public function add(Emprunt $emprunt) {
		// Préparation de la requête
		$add_emprunt = $this->bdd->prepare('INSERT INTO advert(	advert.`abonne_id`
                                                                advert.`livre_id`,
                                                                advert.`date_emprunt`,
																advert.`date_rendu`)
										   VALUES (:abonne_id, :livre_id, :date_emprunt, :date_rendu);');
		// On associe une valeur aux différents marqueurs de la requête
		$add_emprunt->bindValue(':abonne_id', $emprunt->getAbonne_id(), PDO::PARAM_INT);
		$add_empruunt->bindValue(':livre_id', $emprunt->getLivre_id(), PDO::PARAM_INT);
		$add_emprunt->bindValue(':date_emprunt', $emprunt->getDate_emprunt(), PDO::PARAM_STR);
		$add_emprunt->bindValue(':date_rendu', $emprunt->getDate_rendu(), PDO::PARAM_STR);
		// Exécution de la requête
		$add_emprunt->execute();
		// Retourne soit FALSE en cas d'erreur, soit le numéro de l'Id de l'annonce
        return $this->bdd->lastInsertId();
	}

	/**
	 * [Update an Emprunt in Db]
	 * @param Emprunt $emp
	 * @return boolean
	 */
	public function update(Emprunt $emp) {
		// Préparation de la requête
		$update = $this->bdd->prepare(' UPDATE `advert` SET 	advert.`abonne_id` = :abonne_id,
																  	advert.`livre_id` = :livre_id,
																  	advert.`date_emprunt` = :date_emprunt,
																  	advert.`date_rendu` = :date_rendu,
											   WHERE advert.`id_advert` = :id_advert;');
		// On associe une valeur aux différents marqueurs de la requête
		$update->bindValue(':abonne_id', $emp->getAbonne_id(), PDO::PARAM_INT);
		$update->bindValue(':livre_id', $emp->getLivre_id(), PDO::PARAM_INT);
		$update->bindValue(':date_emprunt', $emp->getDate_emprunt(), PDO::PARAM_STR);
		$update->bindValue(':date_rendu', $emp->getDate_rendu(), PDO::PARAM_STR);
		// Exécution de la requête
		$update_advert->execute();
		// Retourne soit FALSE en cas d'erreur, doit le nombre de lignes affectés par la requète
        return $update_advert->rowCount();
	}

	/**
	 * [Delete an Emprunt in Db]
	 * @param Emprunt $emp
	 * @return boolean
	 */
	public function delete(Emprunt $emp) {
        $delete = $this->bdd->prepare("DELETE FROM emprunt WHERE emprunt.`id_emprunt` = :id");
        $delete->bindValue(':id', $emp->getId_emprunt(), PDO::PARAM_INT);
        $delete->execute();
        $delete->closeCursor();
        return ($delete->rowCount());
	}

	/**
	 * [Get an Emprunt by his Id]
	 * @param  int $id
	 * @return array
	 */
	public function getEmpruntById($id) {
		$show = $this->bdd->prepare(" SELECT (	emprunt.`abonne_id`,
                                                        emprunt.`livre_id`,
                                                        emprunt.`date_emprunt`,
                                                        emprunt.`date_rendu`
            						   		FROM `emprunt`
            						   		WHERE emprunt.`id_emprunt` = :id");
		$show->execute(['id' => $id]);
		return $show->fetch(PDO::FETCH_ASSOC);
	}

	/**
	 * [Get an Object Emprunt by his Id]
	 * @param  int  $id
	 * @return  Emprunt
	 */
	public function getEmprunt($id) {
		return new Emprunt($this->getEmpruntById($id));
	}

	/**
	 * [Méthode qui retourne la liste des emprunts présents en BDD sous forme de tableau associatif]
	 * @return array
	 */
	public function listEmprunts() {
        $list= $this->bdd->query("SELECT 	emprunt.`abonne_id`, 
											CONCAT( abonne.`prenom`, ' ', abonne.`nom`) AS nom,
											emprunt.`livre_id`, 
											CONCAT( livre.`titre`, ' de ', livre.`auteur`) AS livre, 
											emprunt.`date_emprunt`, emprunt.`date_rendu` 
											FROM `emprunt`
											INNER JOIN `abonne` ON emprunt.`abonne_id` = abonne.`id_abonne`
											INNER JOIN `livre`ON emprunt.`livre_id`= livre.`id_livre`;");
        return $list->fetchAll(PDO::FETCH_ASSOC);
	}	

		
	/**
	 * [Méthode qui retourne la liste des 15 derniers emprunts présents en BDD sous forme de tableau associatif]
	 * @return array
	 */
	public function listLastEmprunts() {
        $list= $this->bdd->query("SELECT 	emprunt.`abonne_id`, 
											CONCAT( abonne.`prenom`, ' ', abonne.`nom`) AS nom,
											emprunt.`livre_id`, 
											CONCAT( livre.`titre`, ' de ', livre.`auteur`) AS livre, 
											emprunt.`date_emprunt`, emprunt.`date_rendu` 
											FROM `emprunt`
											INNER JOIN `abonne` ON emprunt.`abonne_id` = abonne.`id_abonne`
											INNER JOIN `livre`ON emprunt.`livre_id`= livre.`id_livre`
											LIMIT 15;");
        return $list->fetchAll(PDO::FETCH_ASSOC);
	}

	public function lsEmprunts() {
        $list= $this->bdd->query("SELECT * FROM `emprunt`");
        return $list->fetchAll(PDO::FETCH_ASSOC);
	}

}