  <?php

  function getUser( $userId ){

    if(isset($_POST['save'])){
        $query = $db->prepare('INSERT INTO user (firstname, lastname, password, email, is_admin, bio) VALUES (?, ?, ?, ?, ?, ?)');
        $newUser = $query->execute(
    		[
    			$_POST['firstname'],
    			$_POST['lastname'],
    			$_POST['password'],
    			$_POST['email'],
    			$_POST['is_admin'],
    			$_POST['bio'],
    		]
        );
    	//redirection après enregistrement
    	//si $newUser alors l'enregistrement a fonctionné
    	if($newUser){
    		header('location:user-list.php');
    		exit;
        }
    	else{ //si pas $newUser => enregistrement échoué => générer un message pour l'administrateur à afficher plus bas
    		$message = "Impossible d'enregistrer le nouvel utilisateur...";
    	}
    }
  }
  function getModifUser( $userId ){

    if(isset($_POST['update'])){

    	$query = $db->prepare('UPDATE user SET
    		firstname = :firstname,
    		lastname = :lastname,
    		password = :password,
    		email = :email,
    		bio = :bio,
    		is_admin = :is_admin
    		WHERE id = :id'
    	);

    	//données du formulaire
    	$result = $query->execute(
    		[
    			'firstname' => $_POST['firstname'],
    			'lastname' => $_POST['lastname'],
    			'password' => $_POST['password'],
    			'email' => $_POST['email'],
    			'is_admin' => $_POST['is_admin'],
    			'bio' => $_POST['bio'],
    			'id' => $_POST['id'],
    		]
    	);

    	if($result){
    		header('location:user-list.php');
    		exit;
    	}
    	else{
    		$message = 'Erreur.';
    	}
    }
  }
  if(isset($_GET['user_id']) && isset($_GET['action']) && $_GET['action'] == 'edit'){

  	$query = $db->prepare('SELECT * FROM user WHERE id = ?');
      $query->execute(array($_GET['user_id']));
  	//$user contiendra les informations de l'utilisateur dont l'id a été envoyé en paramètre d'URL
  	$user = $query->fetch();
  }
  ?>
