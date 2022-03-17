<?php
require_once 'bdd.class.php';

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
	 * @param Emprunt $advert
	 */
	public function add(Advert $advert) {
		// Préparation de la requête
		$add_advert = $this->bdd->prepare('INSERT INTO advert(	advert.`abonne_id`
                                                                advert.`livre_id`,
                                                                advert.`date_emprunt`,
																advert.`date_rendu`)
										   VALUES (:abonne_id, :livre_id, :date_emprunt, :date_rendu);');
		// On associe une valeur aux différents marqueurs de la requête
		$add_advert->bindValue(':abonne_id', $advert->getAbonne_id(), PDO::PARAM_INT);
		$add_advert->bindValue(':livre_id', $advert->getLivre_id(), PDO::PARAM_INT);
		$add_advert->bindValue(':date_emprunt', $advert->getDate_emprunt(), PDO::PARAM_STR);
		$add_advert->bindValue(':date_rendu', $advert->getDate_rendu(), PDO::PARAM_STR);
		// Exécution de la requête
		$add_advert->execute();
		// Retourne soit FALSE en cas d'erreur, soit le numéro de l'Id de l'annonce
        return $this->bdd->lastInsertId();
	}

	/**
	 * [Update an Advert in Db]
	 * @param Advert $advert
	 * @return boolean
	 */
	public function update(Advert $advert) {
		// Préparation de la requête
		$update_advert = $this->bdd->prepare(' UPDATE `advert` SET 	advert.`abonne_id` = :abonne_id,
																  	advert.`livre_id` = :livre_id,
																  	advert.`date_emprunt` = :date_emprunt,
																  	advert.`date_rendu` = :date_rendu,
											   WHERE advert.`id_advert` = :id_advert;');
		// On associe une valeur aux différents marqueurs de la requête
		$update_advert->bindValue(':abonne_id', $advert->getAbonne_id(), PDO::PARAM_INT);
		$update_advert->bindValue(':livre_id', $advert->getLivre_id(), PDO::PARAM_INT);
		$update_advert->bindValue(':date_emprunt', $advert->getDate_emprunt(), PDO::PARAM_STR);
		$update_advert->bindValue(':date_rendu', $advert->getDate_rendu(), PDO::PARAM_STR);
		// Exécution de la requête
		$update_advert->execute();
		// Retourne soit FALSE en cas d'erreur, doit le nombre de lignes affectés par la requète
        return $update_advert->rowCount();
	}

	/**
	 * [Delete an advert in Db]
	 * @param Advert $advert
	 * @return boolean
	 */
	public function delete(Advert $advert) {
        $delete_advert = $this->bdd->prepare("DELETE FROM advert WHERE advert.`id_advert` = :id");
        $delete_advert->bindValue(':id', $advert->getId_advert(), PDO::PARAM_INT);
        $delete_advert->execute();
        $delete_advert->closeCursor();
        return ($delete_advert->rowCount());
	}

	/**
	 * [Get an advert by his Id]
	 * @param  int $id
	 * @return array
	 */
	public function getById($id) {
		$show_advert = $this->bdd->prepare(" SELECT (	advert.`abonne_id`
                                                        advert.`livre_id`,
                                                        advert.`date_emprunt`,
                                                        advert.`date_rendu`,
													category.`value` AS category
            						   		FROM `advert`
                                       		INNER JOIN `category` ON advert.`category_id` = category.`id_category`
            						   		WHERE advert.`id_advert` = :id");
		$show_advert->execute(['id' => $id]);
		return $show_advert->fetch(PDO::FETCH_ASSOC);
	}

	/**
	 * [Get an Object advert by his Id]
	 * @param  int  $id
	 * @return  Advert
	 */
	public function getAdvert($id) {
		return new Advert($this->getById($id));
	}

	/**
	 * [Méthode qui retourne la liste des annonces présentes en BDD sous forme de tableau associatif]
	 * @return array
	 */
	public function list() {
        $list_adverts = $this->bdd->query('	SELECT 	advert.`abonne_id`
                                                    advert.`livre_id`,
                                                    advert.`date_emprunt`,
                                                    advert.`date_rendu`,
        										  	category.`value` AS category
            							   	FROM `advert`
            							   	INNER JOIN `category` ON advert.`category_id` = category.`id_category`;');
        return $list_adverts->fetchAll(PDO::FETCH_ASSOC);
	}	

	/**
	 * [Méthode qui retourne la liste des annonces présentes en BDD sous forme de tableau associatif dans l’ordre antéchronologique (la plus récente en premier) et seules les 15 dernières annonces]
	 * @return array
	 */
	public function listParts() {

        $listParts_adverts = $this->bdd->query('SELECT 	advert.`id_emprunt`, 
        												advert.`abonne_id`
                                                        advert.`livre_id`,
                                                        advert.`date_emprunt`,
                                                        advert.`date_rendu`, 
        										  		category.`value` AS category
            							   		FROM `advert`
            							   		INNER JOIN `category` ON advert.`category_id` = category.`id_category`  
            							   		ORDER BY `created_at` DESC LIMIT 0, 15;');
        return $listParts_adverts->fetchAll(PDO::FETCH_ASSOC);            
	}

	/**
	 * [Modifie l'annonce en ajoutant un message de réservation]
	 * @return boolean
	 */
	public function book(Advert $advert) {
		$book_advert = $this->bdd->prepare('UPDATE `advert` 
											SET advert.`reservation_message` = :reservation_message 
											WHERE advert.`id_advert` = :id_advert');
		$book_advert->bindValue(':reservation_message', $advert->getReservation_message(), PDO::PARAM_STR);
		$book_advert->bindValue(':id_advert', $advert->getId_advert(), PDO::PARAM_INT);
        $book_advert->execute();
        $book_advert->closeCursor();
        return ($book_advert->rowCount());
	}

	/**
	 * [Retourne les différentes Categories sous forme de tableau]
	 * @return array
	 */
	public function getCategory() {
		return $this->bdd->query("SELECT * FROM `category`")->fetchAll(PDO::FETCH_ASSOC);
	}

}