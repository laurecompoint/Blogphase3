
<?php


require_once('models/category.php');
require_once('models/user.php');


$categories = getCategories();

if(isset($_POST['login'])){

  //si email ou password non renseigné
  if(empty($_POST['email']) OR empty($_POST['password'])){
    $message = "Merci de remplir tous les champs";
  }
  else{
    //on cherche un utilisateur correspondant au couple email / password renseigné
    $query = $db->prepare('SELECT *
              FROM user
              WHERE email = ? AND password = ?');
    $query->execute( array( $_POST['email'], $_POST['password'] ) );
    $user = $query->fetch();

    //si un utilisateur correspond
    if($user){

      $_SESSION['user'] = $user['firstname'];

    }
    else{ //si pas d'utilisateur correspondant on génère un message pour l'afficher plus bas
      $message = "Mauvais identifiants";
    }
  }
}


require_once('views/user.php');

?>
