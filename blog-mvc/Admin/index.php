<?php

require_once('../common.php');
$db = dbConnect();
session_start();

if(isset($_GET['pageadmin'])){

  if($_GET['pageadmin'] == 'article-list'){
    require_once('controllers/article-list.php');
  }
  elseif($_GET['pageadmin'] == 'article-form'){
    require_once('controllers/article-form.php');
  }
  elseif($_GET['pageadmin'] == 'category-list'){
    require_once('controllers/category-list.php');
  }
  elseif($_GET['pageadmin'] == 'category-form'){
    require_once('controllers/category-form.php');
  }
  elseif($_GET['pageadmin'] == 'user-list'){
    require_once('controllers/user-list.php');
  }
  elseif($_GET['pageadmin'] == 'user-form'){
    require_once('controllers/user-form.php');
  }
  else{
    require_once('controllers/index.php');
  }
}
else{
  require_once('controllers/index.php');
}



?>
