
<?php


require_once('models/category.php');
require_once('models/user.php');


$categories = getCategories();


require_once('views/user.php');

?>
