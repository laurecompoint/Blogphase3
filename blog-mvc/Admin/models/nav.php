<?php
	//nombre d'enregistrements de la table user
	$nbUsers = $db->query("SELECT COUNT(*) FROM user")->fetchColumn();
	//nombre d'enregistrements de la table category
	$nbCategories = $db->query("SELECT COUNT(*) FROM category")->fetchColumn();
	//nombre d'enregistrements de la table article
	$nbArticles = $db->query("SELECT COUNT(*) FROM article")->fetchColumn();
?>
