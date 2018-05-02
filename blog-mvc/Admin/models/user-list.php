<?php


  function getUser( $userId ){
		if(isset($_GET['user_id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){

 	 	$query = $db->prepare('DELETE FROM article WHERE id = ?');
 	 	$result = $query->execute(
 	 		[
 	 			$_GET['user_id']
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

$query = $db->query('SELECT * FROM user');
$users = $query->fetchall();

?>
