<?php

require_once 'bdd/dataBase.php';

class LivreManager extends BDD {

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
     * AddLivre: ajoute un livre en bdd
     * @param Livre $livre
     * @return int
     */
    public function addLivre(Livre $livre): int
    {
        $addLivre = $this->bdd->prepare(
            "INSERT INTO livre (titre, auteur) VALUES (:titre, :auteur)"
        );
        $addLivre->bindValue(':titre', $livre->getTitre(), PDO::PARAM_STR);
        $addLivre->bindValue(':auteur', $livre->getAuteur(), PDO::PARAM_STR);

        $addLivre->execute();

        return( $this->bdd->lastInsertId() );
    }

	/**
	 * [Update an Advert in Db]
	 * @param Advert $advert
	 * @return boolean
	 */
	public function updateLivre(Livre $livre) {
		// Préparation de la requête
		$update_livre = $this->bdd->prepare(' UPDATE `livre` SET 	livre.`titre` = :titre,
																  	livre.`auteur` = :auteur
											   WHERE livre.`id_livre` = :id_livre;');
		// On associe une valeur aux différents marqueurs de la requête
		$update_livre->bindValue(':titre', $livre->getTitre(), PDO::PARAM_STR);
		$update_livre->bindValue(':auteur', $livre->getAuteur(), PDO::PARAM_STR);
		$update_livre->bindValue(':id_livre', $livre->getId_livre(), PDO::PARAM_INT);
		// Exécution de la requête
		$update_livre->execute();
		// Retourne soit FALSE en cas d'erreur, doit le nombre de lignes affectés par la requète
        return $update_livre->rowCount();
	}

	/**
	 * Supprime un livre en bdd
	 * @param Livre $livre
	 * @return boolean
	 */
	public function deleteLivre(Livre $livre) {
        $delete_livre = $this->bdd->prepare("DELETE FROM livre WHERE livre.`id_livre` = :id");
        $delete_livre->bindValue(':id', $livre->getId_livre(), PDO::PARAM_INT);
        $delete_livre->execute();
        $delete_livre->closeCursor();
        return ($delete_livre->rowCount());
	}

	/**
	 * [Get un livre by his Id sous forme de tableau]
	 * @param  int $id
	 * @return array
	 */
	public function getArrayLivreById($id) {
		$show_livre= $this->bdd->prepare(" SELECT livre.`id_livre`, 
												    livre.`titre`, 
													livre.`auteur`
            						   		FROM `livre`
            						   		WHERE livre.`id_livre` = :id");
		$show_livre->execute(['id' => $id]);
		return $show_livre->fetch(PDO::FETCH_ASSOC);
	}

	/**
	 * [Get an Object livre by his Id]
	 * @param  int  $id
	 * @return  Livre
	 */
	public function getLivreById($id) {
		return new Livre($this->getArrayLivreById($id));
	}

	/**
	 * [Méthode qui retourne la liste des annonces présentes en BDD sous forme de tableau associatif]
	 * @return array
	 */
	public function listLivres() {
        $list_livres = $this->bdd->query('	SELECT 	livre.`id_livre`, 
        											livre.`titre`, 
        											livre.`auteur`
            							   	FROM `livre`');
        return $list_livres->fetchAll(PDO::FETCH_ASSOC);
	}
}
