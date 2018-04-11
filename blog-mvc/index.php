
<?php

require_once('models/index-models.php');
require_once('views/index-view.php');

//index
getArticles(3, false);

?>
//article_list si category_id envoyé
getArticles(flase, $_GET['category_id']);
//article_list category_id non envoyé
getArticles(flase, false);
