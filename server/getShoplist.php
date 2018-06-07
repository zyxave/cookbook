<?php

header('Access-Control-Allow-Origin: *'); 	
include('connection.php');

$sql = $conn->query("SELECT r.name, m.material, i.bought, i.id_material, i.id_recipe
					FROM material m inner join ingredient i ON i.id_material=m.id_material inner join recipe r ON i.id_recipe=r.id_recipe
					WHERE i.listed=1");

$ingredients = array();
$i = 0;
while($res = $sql->fetch_assoc()){
	$ingredients[$i]['name'] = $res['name'];
	$ingredients[$i]['material'] = $res['material'];
	$ingredients[$i]['bought'] = $res['bought'];
	$ingredients[$i]['id_material'] = $res['id_material'];
	$ingredients[$i]['id_recipe'] = $res['id_recipe'];

	$i++;
}

echo json_encode($ingredients);

?>