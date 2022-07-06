<?php

$server = '127.0.0.1';
$user = 'hadrien';
$mdp = 'stage2023';
$bdd='Montpellier';

$mysqli = new mysqli($server,$user,$mdp, $bdd, 3306);
if ($mysqli->connect_errno)
{
   echo "Err-1001 : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$conn = new mysqli($server,$user,$mdp, $bdd);

$aid=$_POST["AID"];
$uid=$_POST["UID"];

date_default_timezone_set('Europe/Paris');
$datesortie=date('Y-m-d h:i:s a', time());

$sql = "INSERT INTO entree_sortie (ESarticleemp, ESuti, ESdatesortie) values ('$aid','$uid','$datesortie');";
if ($conn->query($sql) === TRUE) {
  echo "Ajout réussi";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();



?>