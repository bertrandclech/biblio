<?php include_once('inc/header.php') ?>

<body class="p-4 text-center">

    <h1 class="mb-5 text-primary">GESTION DES LIVRES</h1>

    <form id="livre" action="" method="">
        <fieldset class="container border border-primary rounded p-3">
            <legend class="float-none w-auto text-primary p-2"> Ajouter un nouveau livre </legend>

            <p>
            <label for="titre">Titre : </label>
            <input type="text" name="titre" id="titre">

            <label for="auteur" class="ms-5">Auteur : </label>
            <input type="text" name="auteur" id="auteur">
            </p>

            <button class="btn btn-primary mt-3" type="submit">Sauvegarder ce livre en BDD</button>

        </fieldset>
    </form>

    <div class="msg mt-3" style="color: red"></div>

    <table class="table table-striped mt-5">
        <tr class="table-dark">
            <th>Id</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>

        <tbody class="insert">
<!--             Emplacement du tableau des livres -->
            <tr>
                <td colspan="5"  style="color: red">Aucun livre à afficher</td>
            </tr>
        </tbody>
    </table>
    
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edition d'un livre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form>
                    <p>
                        <label for="titre">Titre : </label>
                        <input type="text" name="titre" id="titre">

                        <label for="auteur" class="ms-5">Auteur : </label>
                        <input type="text" name="auteur" id="auteur">
                    </p>
                </form>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Enregistrer</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
            </div>
        </div>
    </div>



<!-- SCRIPTS JS (jQuery et script JS) -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
