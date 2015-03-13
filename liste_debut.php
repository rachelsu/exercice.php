DOCTYPE html>
<?php
/* ---------------------------------------------------------------------
 *                        Exercice 4-002
 * Nom du fichier: liste_debut.php
 * Auteur: PKR
 * Date: Janvier 2008
 * Description: Ce script permet de lister tout ce qui est contenu
 * 				dans la table liste_email
 * ---------------------------------------------------------------------
 */
// Constantes
//
// Pour se connecter à la base de données
const DB_SERVER = 'localhost';
const DB_USER   = 'cpnv';
const DB_PWD    = 'cpnv1234';
const DB_NAME   = 'ch04';
// Variables
//


?>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Exercice 4-002</title>
</head>
<body>

<?php

// on se connecte à la base de données
$link = @new mysqli(DB_SERVER, DB_USER, DB_PWD, DB_NAME);
if ($link->connect_errono) {
	echo "Problème de connexion à la base de données";
	exit();
}

echo "<h2>Voici la liste des emails</h2>";

// la requête d'affichage des utilisateurs
$sql = "SELECT email_id, email, date_inscription FROM liste_email
			  ORDER BY date_inscription";

//echo $sql;

if (!$result = $link->query($sql)) {
  echo "Problème lors de l'exécution de la requête!";
  exit();
}

// est-ce que la requête retourne quelque chose
if ($link->numrows($result) < 1){
	echo "<h3>Il n'y a pas d'email</h3>";
	exit();
}
?>
//Création du tableau qui affiche les enregistrements
<p>Voici la liste des emails<p>
<?php    
              $sql = 'SELECT email_id FROM liste_email';
              if ($result = $dbh->query($sql)) {
              $nbr = $result->num_rows;
              echo "Il y a $nbr email(s)";
?>
<p><a href="ajouter_email.php">Rajouter un email</a><p>
    <table> 
      <tr>
          <th> ID </th>
          <th> Date </th>
          <th> Options </th>
      </tr>
      <tr>
          <td> 
              $sql = 'SELECT email_id FROM liste_email';
              if ($result = $dbh->query($sql)) {
              $nbr = $result->num_rows;
              echo "Il y a $nbr email(s)";
              }
          </td>
      </tr>
      <tr>
          <td> 
             <a href="ajouter_email.php">Rajouter un email</a>
          </td>
      </tr>
      </tr>
          <td> ID </td>
          <td> Date </td>
          <td> Options </td>
      </tr>
      <tr>
           <?= while ($row = $link->fetch_assoc()) { ?>
          <td> <?= echo $row['email_id'] ?> </td> 
          <td> <?=echo $row['email'] ?> </td> 
          <td> <?=echo $row['date_inscription'] ?> </td> 
          <td> <a href="mettre_a_jour.php">Mettre à jour</a> </td> 
          <td> <a href="effacer.php">Effacer</a> </td> 
<?php 
              }
?>
      </tr>
    </table>
?>
</body>
</html>
