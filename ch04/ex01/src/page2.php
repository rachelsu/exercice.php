<!doctype html>
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
$dbh = new mysqli(SERVEUR, USER, PWD, DBNAME);

if ($dbh->connect_error) {

    die('Problème de connexion (' . $dbh->connect_errno . ') '
            . $dbh->connect_error);

}

echo 'La connexion à la base de donnée a fonctionnée. <br>';

$dbh->query("insert into liste_email(email, date_inscription) values ('$emailutilisateur', NOW())");

if ($dbh->errno) {
    echo "cest pas bon: ({$dbh->errno}) : {$dbh->error}<br>";
}

if ($result=$dbh->query("Select email FROM liste_email")) {
    printf("Select a retourné %d lignes. \n" , $result->num_rows);
    
    $result->close();
}

$sql = 'SELECT email FROM liste_email WHERE email_id = 1'; 
$res = $dbh->query($sql);
// tester si correct...  puis:
$row = $res->fetch_array();
echo "L'email: " . $row['email'] . "<br />";

$dbh->close;
?>
</body>
</html>

