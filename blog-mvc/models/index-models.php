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

function index( $articleId ){

	$db = dbConnect();

	$query = $db->query('
		SELECT article.*, GROUP_CONCAT(category.name SEPARATOR " / ") AS categories
		FROM article
		JOIN article_category ON article.id = article_category.article_id
		JOIN category ON category.id = article_category.category_id
		WHERE article.is_published = 1
		GROUP BY article.id
		ORDER BY created_at DESC
		LIMIT 0, 3'
	);

	$query->execute( array( $articleId ) );

	return $query->fetch();

}









						?>
