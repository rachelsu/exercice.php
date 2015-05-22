<!DOCTYPE html>
<?php
/* ---------------------------------------------------------------------
 *                        Chapitre 4 TE3
 * Nom du fichier: traitement.php
 * Auteur: Rachel Suter
 * Date: 22 mai 2015
 * Description: Te 3
 * ---------------------------------------------------------------------
 */
 
//
//Constantes pour la connexion à la dbh
//

const DB_SERVER = 'localhost';
const DB_USER   = 'cpnv';
const DB_PWD    = 'cpnv1234';
const DB_NAME   = 'world';

//
//Déclaration des variables
//

$mysqli=" ";
$sexe=" ";
$nom=" ";
$email=" ";

//
//Récupérage des variables
//

$sexe=htmlspecialchars($_POST['sexe']);
$nom=htmlspecialchars($_POST['nom']);
$email=htmlspecialchars($_POST['email']);

//
//Connexion à la base de données
//

    // Connexion à la base de données
    $mysqli = @new mysqli(DB_SERVER, DB_USER, DB_PWD, DB_NAME);

    //Gestion d'erreur de la connexion à la base de données
    if ($mysqli->connect_errno) {
        die("Problème de connexion ({$mysqli->connect_errno}) " . 
                                     $mysqli->connect_error);
    }

?>

<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Chapitre 4 TE3</title>
</head>
<body>
<?php
//
//Affichage du message
//

if($sexe =="F"){
    echo"Bonjour Mme. {$nom}, votre adresse courriel est: {$email}";
}else{
    echo"Bonjour M. {$nom}, votre adresse courriel est: {$email}";
}

$mysqli->close();
?>
</body>
</html>
