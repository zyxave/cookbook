<?php

header('Access-Control-Allow-Origin: *'); 	
include('connection.php');

$idRecipe = $_GET['id'];

$sql = $conn->query("UPDATE recipe set listed=1 where id_recipe=".$idRecipe);


?>