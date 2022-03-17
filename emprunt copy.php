			<?php 

			include_once "header.php";

			spl_autoload_register(function($classe){
				require 'class/' .$classe. '.class.php';
			});

			// $livreManager = new LivreManager($bdd);
			// $livres = $livreManager->getListLivres();

			?>
			
			<table class='table table-hover table-dark w-75 mx-auto my-5 shadow-lg p-3 mb-5 bg-body rounded text-center'>
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

			<form id="emprunt" action="" method="">
       			<fieldset class="container border border-dark rounded p-3">
					<legend class="float-none w-auto text-dark p-2"> Ajouter un nouvel emprunt : </legend>

					<label for="checkbox_abo">Choisir un abonné :</label>
					<select name="checkbox_abo" class="my-3 form-select" aria-label="Default select example">
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
		</main>

		<!-- SCRIPTS JS (jQuery et script JS) -->
		<script src="js/jquery-3.6.0.min.js"></script>
    	<script src="js/script_emprunt.js"></script>
	</body>
</html>