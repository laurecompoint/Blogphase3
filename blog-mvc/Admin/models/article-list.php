<?php
  

  function getArticle( $articleId ){
		if(isset($_GET['article_id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){

 	 	$query = $db->prepare('DELETE FROM article WHERE id = ?');
 	 	$result = $query->execute(
 	 		[
 	 			$_GET['article_id']
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


$db = dbConnect();

$query = $db->query('SELECT * FROM article');
$articles = $query->fetchall();

?>
