<?php
// Connexion à la base de données
try { $bdd = new PDO('mysql:host=localhost;dbname=garage;charset=utf8', 'root', '', [PDO::ATTR_EMULATE_PREPARES=>false]); }
// echo "Connecté à la base";
catch (Exception $e) { echo $e->getMessage(); }
// Si le try échoue, on capture l'erreur et on l'affiche
