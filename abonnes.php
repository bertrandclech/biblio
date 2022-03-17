<?php include_once('inc/header.php') ?>

<body class="p-4 text-center">

    <h1 class="mb-5 text-primary">GESTION DES ABONNES</h1>

    <table class="table table-striped mt-5 table-bordered table-hover">
        <thead class="thead-dark">
        <tr class="table-dark">
            <th>Nom</th>
            <th>Prenom</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        </thead>

        <tbody class="insert">
<!--             Emplacement du tableau des livres -->
            <tr>
                <td colspan="5"  style="color: red">Aucun Abonne à afficher</td>
            </tr>
        </tbody>
    </table>

    <div class="msg mt-3" style="color: red"></div>

    <form id="livre" action="" method="">
        <fieldset class="container border border-primary rounded p-3">
            <legend class="float-none w-auto text-primary p-2"> Ajouter un nouvelle abonne </legend>

            <p>
            <label for="nom">Nom : </label>
            <input type="text" name="nom" id="nom">

            <label for="prenom" class="ms-5">Prenom : </label>
            <input type="text" name="prenom" id="prenom">
            </p>

            <button class="btn btn-primary mt-3" type="submit">Sauvegarder l'abonne en BDD</button>

        </fieldset>
    </form>

    



<!-- SCRIPTS JS (jQuery et script JS) -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
