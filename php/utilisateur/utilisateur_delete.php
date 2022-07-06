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

$uid=$_POST["UID"];
$sql1 = "DELETE FROM entree_sortie where ESuti = '$uid';";

if ($conn->query($sql1) === TRUE) {
  echo "Suppression réussi";
} else {
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$sql2 = "DELETE FROM utilisateur where Uid = '$uid';";

if ($conn->query($sql2) === TRUE) {
  echo "Suppression réussi";
} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}




$conn->close();

?>