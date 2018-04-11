<?php



function getCategories(){

	$db = dbConnect();

	$query = $db->query('SELECT * FROM category');

	return $query->fetchAll();


}

?>
