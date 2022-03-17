<?php
// Auto-chargement des classes utilisées dans ce fichier
require_once('autoload.php');
// Instancie un manager pour les livres, abonnées ert emprunts
$abonneManager = new AbonneManager();

//var_dump($_POST);

// ACTION de lire les données dans la BDD (Abonne)
if (isset($_POST['action']) && $_POST['action'] ==  'listAbonnes') {   //je recois la requete ajax pour afficher les Abonne
    //var_dump($abonneManager->listAbonne());
    //die();
    // J'effectue la requête de lecture dans la table que je renvoie dans un tableau
    $tab['abonnes'] = $abonneManager->listAbonnes();
    // Je prépare une variable qui me permettra de savoir si j'ai des Abonne dans ma base de données
    // Je regarde si le tableau contient des Abonne si oui la variable passe à 'Vrai'
    $tab['resultat'] = ( count($tab['abonnes']) > 0 );
    // je renvoie mon tableau de véhicules et ma variable de controle en JSON à la requête Ajax
    echo(json_encode($tab));
 //   exit();            
}

// Ajouter un Abonne à la BDD et vérifie que l'on vient bien d'un formulaire
if ( isset($_POST['action']) && $_POST['action']=='addAbonne' && !empty($_POST) ) {
    $addAction = $abonneManager->addAbonne(new Abonne([  'nom' => $_POST['nom'],
                                                      'prenom' => $_POST['prenom'] ]));

    $tab['resultat'] = $addAction;
    echo json_encode($tab);  
}

// Modifie une annonce dans la BDD et vérifie que l'on vient bien d'un formulaire
if ( isset($_GET['action']) &&  $_GET['action']=='updateAbonne' && !empty($_POST) ) {
    $abonneManager->updateAbonne(new Abonne([ 'id_abonne' => $_POST['id_abonne'],
                                        'titre' => $_POST['titre'],
                                        'auteur' => $_POST['auteur'] ]));
 //   ? header("Location: show.php?id=" . $_POST['id_abonne']) : header("Location: update.php?id=" . $_POST['id_advert']);
}

// Supprime un Abonne dans la BDD
if ( isset($_GET['action']) && $_GET['action']=='deleteAbonne'  ) {
    $abonneManager->deleteAbonne($abonneManager->getAbonneById($_GET['id'])); 
//    ? header('Location: list.php') 
//    : header("Location: show.php?id=" . $_GET['id']); 
}   

// Ajouter un abonné à la BDD et vérifie que l'on vient bien d'un formulaire
if ( isset($_GET['action']) && $_GET['action']=='addAbonne' && !empty($_POST) ) {
    $addAction = $abonneManager->add(new Abonne([  'nom' => $_POST['nom'],
                                                      'prenom' => $_POST['prenom'] ]));

    echo $addAction;
 //   if ($addAction ) {
 //       header("Location: test_ajout_abonne.php");
 //    } else {
 //       header('Location: test_ajout_abonne.php');
 //     }   
}

// header('Location: index.php');
