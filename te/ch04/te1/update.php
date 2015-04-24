<!DOCTYPE html>
<?php
/* ---------------------------------------------------------------------
 *                        Chapitre 4 TE1
 * Nom du fichier: edit.php
 * Auteur: Rachel Suter
 * Date: 14 mars 2015
 * Description: Te 1 
 * 
 * ---------------------------------------------------------------------
 */
 // Pour se connecter à la base de données
const DB_SERVER = 'localhost';
const DB_USER   = 'cpnv';
const DB_PWD    = 'cpnv1234';
const DB_NAME   = 'world';

 //Déclaration des variables
$id=$_POST['ID'];
$district=$_POST['District'];
$population=$_POST['Population'];
?>

<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Chapitre 4 TE1</title>
</head>
<body>
<?php


//
//Connexion à la base de données
//

    // Connexion à la base de données
    $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PWD, DB_NAME);

    //Gestion d'erreur de la connexion à la base de données
    if ($mysqli->connect_errno) {
        die("Problème de connexion ({$mysqli->connect_errno}) " .
                                     $mysqli->connect_error);
    }

//
//Requête pour mettre à jour la base de données
//

    $query = "UPDATE City SET District= '$district' , Population = $population WHERE ID = $id ORDER BY Name";
    
    //
    //Gestion des erreurs de la requête
    //
    
    if (!$result = $mysqli->query($query)){
        echo "L'erreur suivante est survenue:" . $mysqli->error;
    }else{

    //
    //Fermeture de la connexion à la base de données
    //
    
    $mysqli->close();

    }

//
//Revenir à la première page après 1 seconde
//

header( "Refresh:1; url=cities.php");

    ?> 
</body>
</html>
