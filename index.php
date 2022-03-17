<?php include_once('inc/header.php') ?>

<body class="p-4 text-center">

   <!-- Partie principale -->
<main>

    <section class="container text-center py-5">
    <h1 class="text-uppercase mt-3 h1">Bienvenue !</h1>
    <p>Si vous voulez emprunter un livre vous êtes au bon endroit.</p>
    </section>
   

    <section class="bg-light py-5">
    <div class="container text-center">
        <h2 class="text-uppercase mt-3 h2">Voici quelques informations afin de vous aider</h2>
        <div class="separator"></div>

        <div class="row">
            <!-- Colonne #1 -->
            <div class="col-12 col-md-4">
                <h3 class="text-uppercase fs-3 mt-3"><?php 
                    include('autoload.php');
                    $livresMgr = new LivreManager;
                    echo( count($livresMgr->ListLivres()) ) ?> livres</h3>
            </div>

            <!-- Colonne #2 -->
            <div class="col-12 col-md-4">
                <div class="circle">
                </div>
                <h3 class="text-uppercase fs-3 mt-3"><?php 
                    include('autoload.php');
                    $userMgr = new AbonneManager;
                    echo( count($userMgr->ListAbonnes()) ) ?> Abonnés</h3>
            </div>

            <!-- Colonne #3 -->
            <div class="col-12 col-md-4">
                <h3 class="text-uppercase fs-3 mt-3"><?php 
                    include('autoload.php');
                    $empMgr = new EmpruntManager;
                    echo( count($empMgr->LsEmprunts()) ) ?>  Emprunts</h3>
            </div>
        </div>
    </div>
</section>

</main>



<!-- SCRIPTS JS (jQuery et script JS) -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
