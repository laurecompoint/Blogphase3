
<?php

require_once('models/article.php');


if(isset($_GET['article_id'])){

	$article = getArticle( $_GET['article_id'] );

	if(!$article['id']){
		header('location:index.php');
		exit;
	}

	$categories = getCategories();

	require_once('views/article.php');
}
else{
	header('location:index.php');
	exit;
}

?>
