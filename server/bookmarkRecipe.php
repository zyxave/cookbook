<?php

header('Access-Control-Allow-Origin: *'); 	
include('connection.php');

$idRecipe = $_GET['id'];
$bookmark = $_GET['bk'];

$sqlRecipe = $conn->query("
	UPDATE recipe
	SET bookmark='$bookmark'
	WHERE id_recipe='$idRecipe'
	");

echo json_encode($bookmark);

?>