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
$aloc=$_POST["ALOC"];

$sql1 = "DELETE FROM entree_sortie where ESarticleemp = '$aid';";

if ($conn->query($sql1) === TRUE) {
  echo "Suppression réussi";
} else {
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}
$sql2 = "DELETE FROM article_stocke where Aid = '$aid';";
if ($conn->query($sql2) === TRUE) {
  echo "Suppression réussi";
} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}
$sql3 = "DELETE FROM localisation where LOCid = '$aloc';";

if ($conn->query($sql3) === TRUE) {
  echo "Suppression réussi";
} else {
  echo "Error: " . $sql3 . "<br>" . $conn->error;
}


$conn->close();

?>