<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 	<?php include_once ("inc/lib.php"); ?>
	<title>BIBLIO BDD</title>
	<style type="text/css">
		body {
			background-color: rgba(0, 0, 0, 0.1);
		}
		/* active */
		.nav-pills .nav-link.active {
		    background-color: rgba(49, 140, 231);
		}

		/* active en hover */
		.nav-pills .nav-link:hover {
		    background-color: rgba(128 208 208);
		}

		/* active (faded) */
		.nav-pills .nav-link {
		    background-color: rgba(112, 41, 99);
		    color: white;
		}		
	</style>
</head>

<body>
	
<header>

	<nav class="navbar navbar-expand-lg navbar-dark pink darken-4 z-depth-2 mb-5">
	    <a class="navbar-brand" href="#.php">BASE DE DONNEES BIBLIOTHEQUE</a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	        <ul class="nav nav-pills ml-auto">
	            <li class="nav-item mx-2">
	                <a class="nav-link active" href="#.php">Abonnés</a>
	            </li>
                <li class="nav-item mx-2">
	                <a class="nav-link active" href="livres.php">Livres</a>
	            </li> <li class="nav-item mx-2">
	                <a class="nav-link active" href="#.php">Emprunts</a>
	            </li>
	        </ul>
	    </div>
	</nav>

</header>