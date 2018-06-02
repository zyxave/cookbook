<?php

header('Access-Control-Allow-Origin: *'); 	
include('connection.php');

if(!isset($_GET['id'])){
	$sqlRecipe = $conn->query("
		SELECT r.*, c.category as 'cat'
		FROM recipe r
		NATURAL JOIN category c
		");

	$recipes = array();
	$i = 0;
	while($resRecipe = $sqlRecipe->fetch_assoc()){
		
		$idRecipe = $resRecipe['id_recipe'];

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
}
else{

	$idRecipe = $_GET['id'];

	$sqlRecipe = $conn->query("
		SELECT r.*, c.category as 'cat'
		FROM recipe r
		NATURAL JOIN category c
		WHERE r.id_recipe='$idRecipe'
		");

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

	$recipes = array();
	$resRecipe = $sqlRecipe->fetch_assoc();

	$recipes['id'] = htmlentities($resRecipe['id_recipe']);
	$recipes['name'] = htmlentities($resRecipe['name']);
	$recipes['image'] = htmlentities($resRecipe['image']);
	$recipes['desc'] = htmlentities($resRecipe['desc']);
	$recipes['ingredients'] = $ingredients;

	$recipes['time'] = htmlentities($resRecipe['time']);
	$recipes['category'] = htmlentities($resRecipe['cat']);
	$recipes['tags'] = $tags;
	$recipes['bookmark'] = htmlentities($resRecipe['bookmark']);

	echo json_encode($recipes);
}

?>