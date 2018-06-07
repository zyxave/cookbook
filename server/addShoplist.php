<?php

header('Access-Control-Allow-Origin: *'); 	
include('connection.php');

$idRecipe = $_GET['id'];
$listed = $_GET['ls'];

$sql = $conn->query("
	UPDATE recipe 
	SET listed='$listed' 
	WHERE id_recipe='$idRecipe'"
	);

echo json_encode($listed);


?>