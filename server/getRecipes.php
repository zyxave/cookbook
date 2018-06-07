<?php


header('Access-Control-Allow-Origin: *');
include('connection.php');

if(!isset($_GET['id'])){
	$queryRecipe;

	if(!isset($_GET['search'])){
		$queryRecipe = "
			SELECT r.*, c.category as 'cat'
			FROM recipe r
			NATURAL JOIN category c
			";

		if(isset($_GET['filter'])){
			// e.g filter=id_category-1
			$whereCol = explode('-', $_GET['filter'])[0];
			$whereVal = explode('-', $_GET['filter'])[1];

			$queryRecipe .= " WHERE `" . $whereCol . "`='" . $whereVal . "'";
			if(isset($_GET['listed'])){
				$queryRecipe .=" and listed=1";
			}
		}
		else if(isset($_GET['listed'])){
			$queryRecipe .=" WHERE listed=1";
		}

		if(isset($_GET['sort'])){
			// e.g sort=time-asc
			$orderCol = explode('-', $_GET['sort'])[0];
			$orderSeq = explode('-', $_GET['sort'])[1];

			$queryRecipe .= " ORDER BY `" . $orderCol . "` " . $orderSeq . ", id_recipe ASC";
		}
		else{
			$queryRecipe .= " ORDER BY r.bookmark DESC, r.id_recipe ASC";
		}
	}
	else{
		$whereVal = $_GET['search'];

		$queryRecipe = "
			SELECT r.*, c.category as 'cat'
			FROM recipe r
			INNER JOIN
				(SELECT DISTINCT r.name as 'name'
					FROM recipe r
					LEFT JOIN category c on r.id_category=c.id_category
					LEFT JOIN tags ts on r.id_recipe=ts.id_recipe
					LEFT JOIN tag t on ts.id_tag=t.id_tag
			        WHERE `name` LIKE '%$whereVal%' OR `tag` LIKE '%$whereVal%') x
			on r.name=x.name
			NATURAL JOIN category c
			ORDER BY r.bookmark DESC, r.id_recipe ASC
			";
	}
	

	$sqlRecipe = $conn->query($queryRecipe);

	$recipes = array();
	$i = 0;
	while($resRecipe = $sqlRecipe->fetch_assoc()){
		
		$idRecipe = $resRecipe['id_recipe'];

		$sqlIngredient = $conn->query("
			SELECT m.*, i.bought
			FROM material m
			NATURAL JOIN ingredient i
			WHERE i.id_recipe='$idRecipe'
			");
		$ingredients = array();
		// $bought = array();
		$j = 0;
		while($resIngredient = $sqlIngredient->fetch_assoc()){

			$ingredients[$j]['id'] = htmlentities($resIngredient['id_material']);
			$ingredients[$j]['material'] = htmlentities($resIngredient['material']);
			$ingredients[$j]['bought'] = htmlentities($resIngredient['bought']);
			// $bought[$j] = htmlentities($resIngredient['bought']);
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
		// $recipes[$i]['material']['ingredients'] = $ingredients;
		// $recipes[$i]['material']['bought'] = $bought;
		$recipes[$i]['listed'] = htmlentities($resRecipe['listed']);

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
			SELECT m.*, i.bought
			FROM material m
			NATURAL JOIN ingredient i
			WHERE i.id_recipe='$idRecipe'
			");
	$ingredients = array();
	$j = 0;
	while($resIngredient = $sqlIngredient->fetch_assoc()){

		$ingredients[$j]['id'] = htmlentities($resIngredient['id_material']);
		$ingredients[$j]['material'] = htmlentities($resIngredient['material']);
		$ingredients[$j]['bought'] = htmlentities($resIngredient['bought']);
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
	$recipes['listed'] = htmlentities($resRecipe['listed']);

	$recipes['time'] = htmlentities($resRecipe['time']);
	$recipes['category'] = ucwords(htmlentities($resRecipe['cat']));
	$recipes['tags'] = $tags;
	$recipes['bookmark'] = htmlentities($resRecipe['bookmark']);

	echo json_encode($recipes);
}

?>