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

$nom=$_POST["UNOM"];
$prenom=$_POST["UPRENOM"];

$sql = "INSERT INTO utilisateur (Unom, Uprenom) VALUES ('$nom','$prenom')";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();



?>