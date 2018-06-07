<?php

header('Access-Control-Allow-Origin: *'); 	
include('connection.php');

$idRecipe = $_GET['id'];
$idIngredient = $_GET['ingr'];
$bought = $_GET['bg'];

$sqlBought = $conn->query("
	UPDATE ingredient
	SET bought='$bought'
	WHERE id_recipe='$idRecipe' AND id_material='$idIngredient'
	");

?>