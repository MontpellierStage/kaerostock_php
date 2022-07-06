<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Accept");
header("Access-Control-Allow-Methods: GET");

static $server = '127.0.0.1';
static $user = 'hadrien';
static $mdp = 'stage2023';
static $bdd='Montpellier';

$mysqli = new mysqli($server,$user,$mdp, $bdd, 3306);
if ($mysqli->connect_errno)
{
   echo "Err-1001 : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$conn = new mysqli($server,$user,$mdp, $bdd);
$sql = "SELECT *  FROM utilisateur ORDER BY Unom,Uprenom;";
 $db_data = array();
    $result = $conn->query($sql);
    $row_cnt = $result->num_rows;
    if($row_cnt > 0){
        while($row = $result->fetch_assoc()){
            $db_data[] = $row;
        }
        echo json_encode($db_data);
    }else{
        echo "ERR_1001";
    }
    $conn->close();
    return;
?>