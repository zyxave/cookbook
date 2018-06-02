<?php

header('Access-Control-Allow-Origin: *'); 	
include('connection.php');

$query;
$idRecipe;
if($_GET['id'] == -1){
	$query = 
		"SELECT r.*, c.category as 'cat'
		FROM recipe r
		NATURAL JOIN category c";
}
else{
	$idRecipe = $_GET['id'];

	$query = 
		"SELECT r.*, c.category as 'cat'
		FROM recipe r
		NATURAL JOIN category c
		WHERE r.id_recipe='$idRecipe'";
}

$sqlRecipe = $conn->query($query);

$recipes = array();
$i = 0;
while($resRecipe = $sqlRecipe->fetch_assoc()){
	
	if($_GET['id'] == -1){
		$idRecipe = $resRecipe['id_recipe'];
	}

	$sqlIngredient = $conn->query("
		SELECT m.material
		FROM material m
		NATURAL JOIN ingredient i
		WHERE i.id_recipe='$idRecipe'
		");
	$ingredients = array();
	$j = 0;
	while($resIngredient = $sqlIngredient->fetch_assoc()){
		$ingredients[$j] = htmlentities($resIngredient['material']);
		$j++;
	}

	$sqlTags = $conn->query("
		SELECT t.tag
		FROM tag t
		NATURAL JOIN tags ts
		WHERE ts.id_recipe='$idRecipe'
		");
	$tags = array();
	$k = 0;
	while($resTags = $sqlTags->fetch_assoc()){
		$tags[$k] = htmlentities($resTags['tag']);
		$k++;
	}

	$recipes[$i]['id'] = htmlentities($resRecipe['id_recipe']);
	$recipes[$i]['name'] = htmlentities($resRecipe['name']);
	$recipes[$i]['image'] = htmlentities($resRecipe['image']);
	$recipes[$i]['desc'] = htmlentities($resRecipe['desc']);
	$recipes[$i]['ingredients'] = $ingredients;

	$recipes[$i]['time'] = htmlentities($resRecipe['time']);
	$recipes[$i]['category'] = htmlentities($resRecipe['cat']);
	$recipes[$i]['tags'] = $tags;
	$recipes[$i]['bookmark'] = htmlentities($resRecipe['bookmark']);

	$i++;
}

echo json_encode($recipes);

?>