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

    <table class="table table-striped mt-5 table-bordered table-hover">
        <thead class="thead-dark">
        <tr class="table-dark">
            <th>Id</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        </thead>

        <tbody class="insert">
<!--             Emplacement du tableau des livres -->
            <tr>
                <td colspan="5"  style="color: red">Aucun livre à afficher</td>
            </tr>
        </tbody>
    </table>
    



<!-- SCRIPTS JS (jQuery et script JS) -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script_livres.js"></script>
</body>
</html>
    