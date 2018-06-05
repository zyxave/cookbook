<?php

header('Access-Control-Allow-Origin: *'); 	
include('connection.php');

$sql = $conn->query("SELECT * FROM category");

$categories = array();
$i = 0;
while($res = $sql->fetch_assoc()){
	$categories[$i]['id'] = $res['id_category'];
	$categories[$i]['category'] = ucwords($res['category']);

	$i++;
}

echo json_encode($categories);

?>