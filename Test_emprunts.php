<?php include_once('inc/header.php') ?>

<body class="p-4 text-center">

    <h1 class="mb-5 text-success">GESTION DES LIVRES</h1>

    <table class="table table-striped mt-5">
        <tr class="table-dark">
            <th>Id</th>
            <th>Titre</th>
            <th>Auteur</th>
        </tr>

        <tbody class="insert">
<!--             Emplacement du tableau des livres -->
            <tr>
                <td colspan="5"  style="color: red">Aucun livre à afficher</td>
            </tr>
        </tbody>
    </table>

    <div class="msg mt-3" style="color: red"></div>

    <form id="livre" action="" method="">
        <fieldset class="container border border-success rounded p-3">
            <legend class="float-none w-auto text-success p-2"> Ajouter un nouveau livre </legend>

            <p>
            <label for="titre">Titre : </label>
            <input type="text" name="titre" id="titre">

            <label for="auteur" class="ms-5">Auteur : </label>
            <input type="text" name="auteur" id="auteur">
            </p>

            <button class="btn btn-success mt-3" type="submit">Sauvegarder ce livre en BDD</button>

        </fieldset>
    </form>

    



<!-- SCRIPTS JS (jQuery et script JS) -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
