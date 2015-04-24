<!DOCTYPE html>
<?php
/* ---------------------------------------------------------------------
 *                        Chapitre 4 TE1
 * Nom du fichier: cities.php
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

//Déclaration de la variable contenant les messages d'erreurs
$error_msessage = '';

//
//Connexion à la base de données
//

    // Connexion à la base de données
    $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PWD, DB_NAME);
    
    //Gestion d'erreur de la connexion à la base de données
    if ($dbh->connect_errno) {
    $error_msg = sprintf('Problème de connexion : (%d) %s',
                         $dbh->connect_errno, $dbh->connect_error);

?>

<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Chapitre 4 TE1</title>
</head>
<body>
<?php



    //Gestion d'erreur de la connexion à la base de données
    if ($mysqli->connect_errno) {
        die("Problème de connexion ({$mysqli->connect_errno}) " . 
                                     $mysqli->connect_error);
    }


//
//Message affichant le nombre de villes en Suisse
//

    // Requête pour l'affichage des villes en Suisse
    if ($result = $mysqli->query("SELECT ID, Name, CountryCode, District FROM City WHERE CountryCode = 'CHE' ORDER BY Name")){

    //Gestion des erreurs lors de la transmission de la requête pour l'affichage des villes en Suisse
    if (!$result) {
        $message  = 'Votre requête est invalide: ' . mysqli_error() . "\n";
        $message .= 'Votre requête complète est: ' . $query;
        die($message);
    }

    //Affichage du nombre de villes en Suisse
        $nbr = $result->num_rows;
        echo "Il y a " .$nbr. " villes en Suisse. \n";
        $result->close();
    }

//
//Tableau avec les villes de Suisse
//

    //Création et affichage du tableau contenant les villes et leurs informations
    ?>
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>CountryCode</th>
        <th>District</th>
        <th>Edit</th>
      </tr>
    <?php
    //Requête pour récupérer les infos
    $query = "SELECT ID, Name, CountryCode, District FROM City WHERE CountryCode = 'CHE' ORDER BY Name";

    if (!$result = $mysqli->query($query)) {
        // erreur
            $message  = 'Requête invalide : ' . mysqli_error() . "\n";
            $message .= 'Requête complète : ' . $query;
    }

        //Création de la boucle permettant d'afficher tous les enregistrements
        while ($city = $result->fetch_assoc()) { ?>
            <tr>
              <td> <?= $city['ID']; ?> </td>
              <td> <?= $city['Name']; ?> </td>
              <td> <?= $city['CountryCode']; ?> </td>
              <td> <?= $city['District']; ?> </td>
              <td> <a href="edit.php?ID=<?=$city['ID']?>" >Edit</a> </td>
        <?php
        }
        $result->free();

    //Fermeture de la connexion à la base de données
    $mysqli->close();
    ?>
            </tr>
    </table>
</body>
</html>
