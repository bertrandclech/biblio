<?php include_once('inc/header.php') ?>

<body class="p-4 text-center">

    <h1 class="mb-5 text-primary">GESTION DES EMPRUNTS</h1>

			<form id="emprunt" action="" method="">
       			<fieldset class="container border border-primary rounded p-3">
					<legend class="float-none w-auto text-dark p-2"> Ajouter un nouvel emprunt : </legend>

					<label for="checkbox_abonne">Choisir un abonné :</label>
					<select name="checkbox_abonne" class="my-3 form-select" aria-label="Default select example">
						<!-- <?php foreach ($abonnes as $name_abonne):?> -->

						<option value=<?=$name_abonne['id_abonne']?>><?=$name_abonne['value']?></option>

						<!-- <?php endforeach; ?> -->
					</select>

					<label for="checkbox_livre">Choisir un livre : </label>
					<select name="checkbox_livre" class="my-3 form-select" aria-label="Default select example">
						<!-- <?php foreach ($livres as $name_livre):?> -->

						<option value=<?=$name_livre['id_livre']?>><?=$name_livre['value']?></option>

						<!-- <?php endforeach; ?> -->
					</select>

					<label for="date_emprunt" class="">Date d'emprunt : </label>
					<input type="date" class="my-3 form-control" name="date_emprunt" id="date_emprunt">
					</p>

					<button class="btn btn-dark mt-3" type="submit">Sauvegarder cet emprunt en BDD</button>
        		</fieldset>
    		</form>

			<div class="msg mt-3 container" style="color: red"></div>

			<table class="table table-striped mt-5 table-bordered table-hover">
				<thead>
					<tr>
						<th>ID de l'emprunt</th>
						<th>Abonné</th>
						<th>Livre</th>
						<th>Date d'emprunt</th>
						<th>Modification</th>
						<th>Suppression</th>
					</tr>
				</thead>		

				<tbody class="insert">
				<!-- Emplacement du tableau des véhicules -->
					<tr>
						<td colspan="6"  style="color: red">Aucun abonné à afficher</td>
					</tr>
				</tbody>
			</table>

		</main>

		<!-- SCRIPTS JS (jQuery et script JS) -->
		<script src="js/jquery-3.6.0.min.js"></script>
    	<script src="js/script_emprunts.js"></script>
	</body>
</html>