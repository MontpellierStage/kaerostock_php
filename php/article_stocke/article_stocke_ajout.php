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

$batiment = $_POST["LOCBAT"];
$numeroe = $_POST["LOCNUMEROE"];
$niveaue = $_POST["LOCNIVEAUE"];
$libelle = $_POST["ALIBELLE"];


$locidmax="SELECT MAX(LOCid) AS LOCMAX FROM localisation;";


$sql = "INSERT INTO localisation (LOCbat,LOCnumeroe,LOCniveaue) VALUES ('$batiment','$numeroe','$niveaue') ;";

if ($conn->query($sql) === TRUE ) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


 $db_data = array();
  $result = $conn->query($locidmax);
  $row_cnt = $result->num_rows;
  if($row_cnt > 0){
          $row = $result->fetch_assoc();
                        $db_data[]=$row;
          $dede = $row['LOCMAX'];
          echo $dede;
  }

$sql2 = "INSERT INTO article_stocke (Aloc, Alibelle) VALUES ('$dede', '$libelle');";
if ($conn->query($sql2) === TRUE ) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$conn->close();
?>