<?php
// Auto-chargement des classes utilisées dans ce fichier
require_once('autoload.php');
// Instancie un manager pour les livres
$livreManager = new LivreManager();
?>  

<?php include_once('inc/header.php') ?>

<h1>Ajouter un livre</h1>
<a href="index.php">Retour à l'accueil de notre site</a>

<form action="controller.php?action=addLivre" method="post">

    <div class="form-group">
        <label for="titre">Titre *</label>
        <input name="titre" type="text" class="form-control" placeholder="Le titre de votre livre ..." required>
    </div>

    <div class="form-group">
        <label for="auteur">Auteur *</label>
        <input name="auteur" cols="30" rows="5" class="form-control" placeholder="L'auteur du livre ..." required>
    </div>

    <button class="btn btn-primary float-right">Ajouter un livre</button>

</form>
