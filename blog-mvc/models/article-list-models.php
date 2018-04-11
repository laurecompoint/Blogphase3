<?php

function dbConnect(){

	try{
		return new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $exception)
	{
		die( 'Erreur : ' . $exception->getMessage() );
	}
}

function getArticleList($limit = false, $categoryId = false) {

if(isset($_GET['category_id']) ){ //si une catégorie est demandée via un id en URL

	//selection de la catégorie en base de données
	$query = $db->prepare('SELECT * FROM category WHERE id = ?');
	$query->execute( array($_GET['category_id']) );

	$currentCategory = $query->fetch();

	if($currentCategory){ //Si la catégorie demandé existe bien

		//récupération des articles publiés qui sont liés à la catégorie ET publiés
		$query = $db->prepare('
			SELECT article.*
			FROM article
			JOIN article_category ON article.id = article_category.article_id
			JOIN category ON article_category.category_id = category.id
			WHERE article.is_published = 1 AND category.id = ?
			GROUP BY article.id
			ORDER BY created_at DESC
		');

		$result = $query->execute( array($_GET['category_id']) );
		//fetchAll() renvoie un ensemble d'enregistrements (tableau), le résultat sera à traiter avec un boucle foreach
		$articles = $query->fetchAll();
	}
	else{ //si la catégorie n'existe pas, redirection vers la page d'accueil
		header('location:index.php');
		exit;
	}

}
else{ //si PAS de catégorie demandée via un id en URL

	//séléction de tous les articles publiés
	$query = $db->query('
		SELECT article.*, GROUP_CONCAT(category.name SEPARATOR " / ") AS categories
		FROM article
		JOIN article_category ON article.id = article_category.article_id
		JOIN category ON article_category.category_id = category.id
		WHERE article.is_published = 1
		GROUP BY article.id
		ORDER BY created_at DESC'
	);
	$articles = $query->fetchAll();
}
}
?>
