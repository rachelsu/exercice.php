DOCTYPE html>
<?php
/* ---------------------------------------------------------------------
 *                        Chapitre 4 TE1
 * Nom du fichier: cities.php
 * Auteur: Rachel Suter
 * Date: 13 mars 2015
 * Description: Te 1
 * ---------------------------------------------------------------------
 */
// Constantes
//
// Pour se connecter à la base de données
const DB_SERVER = 'localhost';
const DB_USER   = 'cpnv';
const DB_PWD    = 'cpnv1234';
const DB_NAME   = 'world';
// Variables
//


?>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Chapitre 4 TE1</title>
</head>
<body>
<?php
// Connexion à la base de données
$dbh = new mysqli(DB_SERVER, DB_USER, DB_PWD, DB_NAME);
if ($dbh->connect_errno) {
    die("Problème de connexion ({$dbh->connect_errno}) " . 
                                 $dbh->connect_error);
    }
    $dbh->close();

// Requête pour l'affichage des villes en Suisse
$sql = "SELECT ID, Name, CountryCode, District FROM City WHERE CountryCode = 'CHE'
			  ORDER BY Name";

//Affichage du nombre de villes en Suisse
if ($result = $dbh->query($sql)) {
    $nbr = $result->num_rows;
    echo "Il y a" . $nbr . "ville(s) en Suisse";
    $result->close();
}

//Vérification des erreurs lors de la transmission de la requête

//Création et affichage du tableau contenant les villes et leurs informations
?>
<table>
  <tr>
    <th> ID </th>
    <th> Name </th>
    <th> CountryCode </th>
    <th> District </th>
    <th> Population </th>
    <th> </th>
  </tr>
  <tr>
  <?= while ($city = $result->fetch_assoc()) { ?>
    <td> <?=echo $city['ID'] ?> </td> 
    <td> <?=echo $city['Name'] ?> </td> 
    <td> <?=echo $city['CountryCode'] ?> </td> 
    <td> <?=echo $city['District'] ?> </td> 
    <td> <a href="edit.php">Modifier</a> </td> 
  <?php 
  }
  ?>
  </tr>
</table>
</body>
</html>
