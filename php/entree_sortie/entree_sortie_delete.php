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

$escode=$_POST["ESCODE"];

$sql = "DELETE FROM entree_sortie where EScode = '$escode';";
if ($conn->query($sql) === TRUE) {
  echo "Suppression réussi";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();



?>