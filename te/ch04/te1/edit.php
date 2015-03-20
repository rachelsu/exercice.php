<!DOCTYPE html>
<?php
/* ---------------------------------------------------------------------
 *                        Chapitre 4 TE1
 * Nom du fichier: edit.php
 * Auteur: Rachel Suter
 * Date: 14 mars 2015
 * Description: Te 1
 * ---------------------------------------------------------------------
 */
 // Pour se connecter à la base de données
const DB_SERVER = 'localhost';
const DB_USER   = 'cpnv';
const DB_PWD    = 'cpnv1234';
const DB_NAME   = 'world';

 //Déclaration des variables
$id=$_GET['ID'];
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
//Formulaire permettant de modifier les données d'une ville
//

    //Requête pour récupérer les infos
    $query = "SELECT ID, Name, CountryCode, District FROM City WHERE ID = $id ORDER BY Name";

    if ($result = $mysqli->query($query)) {

        //Gestion des erreurs lors de la transmission de la requête
        if (!$result) {
            $message  = 'Requête invalide : ' . mysqli_error() . "\n";
            $message .= 'Requête complète : ' . $query;
            die($message);
        }

        //Création de la boucle permettant d'afficher tous les enregistrements
        $city = $result->fetch_assoc();
        ?>

<form method="post" action="cities.php">
   <p>ID:<input type="text" value=<?= $city['ID']; ?> /></p>
   <p>Name:<input type="text" value=<?= $city['Name']; ?> /></p>
   <p>CountryCode:<input type="text" value=<?= $city['CountryCode']; ?> /></p>
   <p>District:<input type="text" value=<?= $city['District']; ?> /></p>
   <input type="submit" value="Modifier" />
   <input type="submit" value="Enregistrer" />
</form>

<?php
    }
    $result->free();
    
    //Fermeture de la connexion à la base de données
    $mysqli->close();
    ?>
</body>
</html>
