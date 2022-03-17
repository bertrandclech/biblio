<?php
// Auto-chargement des classes utilisées dans ce fichier
require_once('autoload.php');
// Instancie un manager pour les livres, abonnées ert emprunts
$livreManager = new LivreManager();
$abonneManager = new AbonneManager();

//var_dump($_POST);

// ACTION de lire les données dans la BDD (Livres)
if (isset($_POST['action']) && $_POST['action'] ==  'listLivres') {   //je recois la requete ajax pour afficher les livres
    //var_dump($livreManager->listLivres());
    //die();
    // J'effectue la requête de lecture dans la table que je renvoie dans un tableau
    $tab['livres'] = $livreManager->listLivres();
    // Je prépare une variable qui me permettra de savoir si j'ai des livres dans ma base de données
    // Je regarde si le tableau contient des livres si oui la variable passe à 'Vrai'
    $tab['resultat'] = ( count($tab['livres']) > 0 );
    // je renvoie mon tableau de véhicules et ma variable de controle en JSON à la requête Ajax
    echo(json_encode($tab));
 //   exit();            
}

// Ajouter un livre à la BDD et vérifie que l'on vient bien d'un formulaire
if ( isset($_POST['action']) && $_POST['action']=='addLivre' && !empty($_POST) ) {
    $addAction = $livreManager->addLivre(new Livre([  'titre' => $_POST['titre'],
                                                      'auteur' => $_POST['auteur'] ]));

    $tab['resultat'] = $addAction;
    echo json_encode($tab);  
}

// Modifie une annonce dans la BDD et vérifie que l'on vient bien d'un formulaire
if ( isset($_GET['action']) &&  $_GET['action']=='updateLivre' && !empty($_POST) ) {
    $livreManager->updateLivre(new Livre([ 'id_livre' => $_POST['id_livre'],
                                        'titre' => $_POST['titre'],
                                        'auteur' => $_POST['auteur'] ]));
 //   ? header("Location: show.php?id=" . $_POST['id_livre']) : header("Location: update.php?id=" . $_POST['id_advert']);
}

// Supprime un livre dans la BDD
if ( isset($_GET['action']) && $_GET['action']=='deleteLivre'  ) {
    $livreManager->deleteLivre($livreManager->getLivreById($_GET['id'])); 
//    ? header('Location: list.php') 
//    : header("Location: show.php?id=" . $_GET['id']); 
}   

// Ajouter un abonné à la BDD et vérifie que l'on vient bien d'un formulaire
if ( isset($_GET['action']) && $_GET['action']=='addAbonne' && !empty($_POST) ) {
    $addAction = $abonneManager->add(new Abonne([  'nom' => $_POST['nom'],
                                                      'prenom' => $_POST['prenom'] ]));

    echo $addAction;
 //   if ($addAction ) {
 //       header("Location: test_ajout_livre.php");
 //    } else {
 //       header('Location: test_ajout_livre.php');
 //     }   
}

// header('Location: index.php');
