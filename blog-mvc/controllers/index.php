<?php

require_once('models/article.php');
require_once('models/category.php');
require_once('models/user.php');


$categories = getCategories();
$articles = getArticles(3);

require_once('views/index.php');

?>
