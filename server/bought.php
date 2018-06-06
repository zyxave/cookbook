<?php

header('Access-Control-Allow-Origin: *'); 	
include('connection.php');

$idRecipe = $_GET['id'];
$ingredient = $_GET['ingr'];


$sql = $conn->query("SELECT id_material FROM material where material='".$ingredient."'");

$idMaterial=0;
while($res = $sql->fetch_assoc()){
	$idMaterial= $res['id_material'];
}
$sql = $conn->query("UPDATE ingredient set bought=1 where id_recipe=".$idRecipe." and id_material=".$idMaterial);

echo $idMaterial;
?>