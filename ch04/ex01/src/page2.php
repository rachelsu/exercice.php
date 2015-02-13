<!Doctype html>
<html>
<head>
		<meta charset="UTF-8"/>
		<title>chap4ex1page1</title>
</head>
<?php
//declaration des constantes et des variables
define("SERVEUR", 'localhost');
define("USER", 'cpnv');
define("PWD", 'cpnv');
define("DBNAME", 'ch04ex01');
$emailutilisateur=$_POST['emailutilisateur'];
?> 
<body>
<?php
$dbh=new mysqli(SERVEUR, USER, PWD, DBNAME);

if ($result=$dbh->query("insert into liste_email(email, date_inscription) values ($emailutilisateur, NOW())){
?>
</body>
</html>

