<?php

header('Access-Control-Allow-Origin: *'); 	
include('connection.php');

$idRecipe = $_GET['id'];

$sql = $conn->query("UPDATE recipe set listed=0 where id_recipe=".$idRecipe);
$sql = $conn->query("UPDATE ingredient set bought=0 where id_recipe=".$idRecipe);


?>