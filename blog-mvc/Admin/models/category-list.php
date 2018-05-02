<?php

function getCategory($categoryId){

	$db = dbConnect();
	if(isset($_GET['category_id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){

		$query = $db->prepare('DELETE FROM category WHERE id = ?');
		$result = $query->execute(
			[
				$_GET['category_id']
			]
		);
		//générer un message à afficher plus bas pour l'administrateur
		if($result){
			$message = "Suppression efféctuée.";
		}
		else{
			$message = "Impossible de supprimer la séléction.";
		}
	}

}

$query = $db->query('SELECT * FROM category');
$categories = $query->fetchall();


?>
