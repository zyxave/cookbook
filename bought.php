<?php

header('Access-Control-Allow-Origin: *'); 	
include('connection.php');

$idRecipe = $_GET['id'];
$ingredient = $_GET['ingr'];


$sql = $conn->query("SELECT m.id_material, i.bought FROM material m inner join ingredient i on i.id_material=m.id_material where material='".$ingredient."' and id_recipe=".$idRecipe);

$idMaterial=0;
$bought=1;
while($res = $sql->fetch_assoc()){
	$idMaterial= $res['id_material'];
	$bought = $res['bought'];
}
if($bought==1){
	$bought=0;
}
else{
	$bought==1;
}
$sql = $conn->query("UPDATE ingredient set bought=".$bought." where id_recipe=".$idRecipe." and id_material=".$idMaterial);

?>