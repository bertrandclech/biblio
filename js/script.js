$(document).ready(function(){

    //Initialisation du site et affichage du tableau de données de véhicules
    function afficheLivres() {

        $.post ('php/ajax.php',  // URL du dossier où s'effectue le traitement
                'action=affiche', // Valeur à 'envoyer', ici pas de valeurs à envoyer uniquement une indication pour le traitement
                // Fonction de retour du traitement permettant l'affichage (données) est le retour du traitement suite à (echo) en PHP
                function (donnees) { //traitement de la réponse
                    // console.log(donnees); // pensez à vérifier vos données ça peut servir !!
                    // je recupère mon tableau de véhicules et ma variable de contrôle en JSON envoyés par PHP en echo
                    if(donnees.resultat){
                        let tab=''; // on initialise une variable pour mettre en forme le tableau
                        // je parcours mon tableau de Véhicules avec une boucle forEach et oui la même qu'en PHP !! 
                        // et je crée ainsi un tableau HTML contenant les valeurs
                        donnees.vehicules.forEach(vehicule => {
                            tab += '<tr>';
                                tab += '<td>' + vehicule.id_vehicule + '</td>';
                                tab += '<td>' + vehicule.marque + '</td>';
                                tab += '<td>' + vehicule.modele + '</td>';
                                tab += '<td>' + vehicule.annee + '</td>';
                                tab += '<td>' + vehicule.couleur + '</td>';
                            tab += '</tr>';
                        });
                        // j'insère mon tableau ainsi crée dans le DOM pour affichage
                        $('.insert').html('');
                        $('.insert').append(tab);
                    }
                }, 'json'); // format attendu pour le retour
    }  // fin de la fonction afficheVehicule

    afficheLivres();

    //soumission du formulaire et déclenchement de l'événement
    $('#vehicule').on('submit', function(e){
        e.preventDefault(); //j'annule l'envoie du formulaire
        $('.msg').html(); //j'efface tout dans la div msg

        // je constitue mon paramètre
        let params='action=insert'; // indication pour le traitement en PHP
        let erreurForm=''; 
        // je teste tous les champs input un par un, si ils sont vides on stocke un message d'erreur
        // sinon on mémorise la valeur dans une variable 'params'
        // et on le fait pour chacun des champs
        $('#marque').val().length ? params += '&marque='+$('#marque').val() : erreurForm += '<div>la marque ne peut pas être vide</div>';
        $('#modele').val().length ? params += '&modele='+$('#modele').val() : erreurForm += '<div>le modèle ne peut pas être vide</div>' ;
        $('#annee').val().length ? params += '&annee='+$('#annee').val() : erreurForm += '<div>l\'année ne peut pas être vide</div>';
        $('#couleur').val().length ?params += '&couleur='+$('#couleur').val() : erreurForm += '<div>la couleur ne peut pas être vide</div>';

         console.log(params); // pensez à vérifier vos données ça peut servir !!
        if (erreurForm.length==0) {
            // si erreurForm  = 0 alors ca veut dire qu'il n'y a pas d'erreurs
            // j'envoie ma requête ajax

            $.post('php/ajax.php', // URL du dossier où s'effectue le traitement
                    params,  // Valeurs à 'envoyer' contenues dans la variable params
                    function (donnees) {  //traitement de la réponse
                        // console.log(donnees); // pensez à vérifier vos données ça peut servir !!
                        //traitement de la réponse
                        if (donnees.resultat){
                            afficheResultat = '<div>vous avez ajouté le véhicule avec succès !</div>';
                            //$('#vehicule').find('input').val(''); // reset du formulaire : on va chercher les enfants de type input et on leur met une valeur vide
                            // autre méthode qui fonctionne aussi
                            $('#vehicule')[0].reset();
                            afficheVehicule(); // pour actualiser le résultat
                        } else {
                            afficheResultat = '<div>une erreur est survenue lors de l\'ajout du véhicule !</div>';
                        }
                        // On insère le message de résultat dans le DOM
                        $('.msg').html(afficheResultat);
                    }, 'json')
        } else {
            // Affichage des messages d'erreurs suivant les champs Input vides
            $('.msg').html(erreurForm);
        }
    }); //fin de l'event

}) //fin du document ready
