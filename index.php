<?php
// Auto-chargement des classes utilisées dans ce fichier
require_once('autoload.php');
// Instancie un manager pour les livres
$livreManager = new LivreManager();
?>  

<?php include_once('inc/header.php') ?>

<h1>Ajouter un livre</h1>
<a href="index.php">Retour à l'accueil de notre site</a>

<form action="controller.php?action=addAbonne" method="post">

    <div class="form-group">
        <label for="nom">Titre *</label>
        <input name="nom" type="text" class="form-control" placeholder="Le nom de l'abonné ..." required>
    </div>

    <div class="form-group">
        <label for="prenom">Auteur *</label>
        <input name="prenom" class="form-control" placeholder="Le prénom de l'abonné ..." required>
    </div>

    <button class="btn btn-primary float-right">Ajouter un abonné</button>

</form>
