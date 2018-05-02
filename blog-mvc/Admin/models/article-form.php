<?php


  function getNewArticle( $articleId ){

    if(isset($_POST['save'])){

        $query = $db->prepare('INSERT INTO article (category_id, title, content, summary, is_published, created_at) VALUES (?, ?, ?, ?, ?, NOW())');
        $newArticle = $query->execute(
    		[
    		  $_POST['category_id'],
    		  $_POST['title'],
    		  $_POST['content'],
    		  $_POST['summary'],
    		  $_POST['is_published']
    		]
        );
    	//redirection après enregistrement
    	//si $newArticle alors l'enregistrement a fonctionné
    	if($newArticle){

    		//upload de l'image si image envoyée via le formulaire
    		if(isset($_FILES['image'])){

    			//tableau des extentions que l'on accepte d'uploader
    			$allowed_extensions = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
    			//extension dufichier envoyé via le formulaire
    			$my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);

    			//si l'extension du fichier envoyé est présente dans le tableau des extensions acceptées
    			if ( in_array($my_file_extension , $allowed_extensions) ){

    				//je génrère une chaîne de caractères aléatoires qui servira de nom de fichier
    				//le but étant de ne pas écraser un éventuel fichier ayant le même nom déjà sur le serveur
    				$new_file_name = md5(rand());

    				//destination du fichier sur le serveur (chemin + nom complet avec extension)
    				$destination = '../img/article/' . $new_file_name . '.' . $my_file_extension;

    				//déplacement du fichier à partir du dossier temporaire du serveur vers sa destination
    				$result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

    				//on récupère l'id du dernier enregistrement en base de données (ici l'article inséré ci-dessus)
    				$lastInsertedArticleId = $db->lastInsertId();

    				//mise à jour de l'article enregistré ci-dessus avec le nom du fichier image qui lui sera associé
    				$query = $db->prepare('UPDATE article SET
    					image = :image
    					WHERE id = :id'
    				);

    				$resultUpdateImage = $query->execute(
    					[
    						'image' => $new_file_name . '.' . $my_file_extension,
    						'id' => $lastInsertedArticleId
    					]
    				);
    			}
    		}

    		//redirection après enregistrement
    		header('location:article-list.php');
    		exit;
        }
    	else{ //si pas $newArticle => enregistrement échoué => générer un message pour l'administrateur à afficher plus bas
    		$message = "Impossible d'enregistrer le nouvel article...";
    	}
    }

  }


    function getModifArticle( $articleId ){

      if(isset($_POST['update'])){

      	$query = $db->prepare('UPDATE article SET
      		category_id = :category_id,
      		title = :title,
      		content = :content,
      		summary = :summary,
      		is_published = :is_published
      		WHERE id = :id'
      	);

      	//mise à jour avec les données du formulaire
        	$resultArticle = $query->execute(
            [
              'category_id' => $_POST['category_id'],
              'title' => $_POST['title'],
              'content' => $_POST['content'],
              'summary' => $_POST['summary'],
              'is_published' => $_POST['is_published'],
              'id' => $_POST['id'],
        		]
          );
      	//si enregistrement ok
      	if($resultArticle){
              if(isset($_FILES['image'])){

                  $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
                  $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);

                  if ( in_array($my_file_extension , $allowed_extensions) ){

      				//si un fichier est soumis lors de la mise à jour, je commence par supprimer l'ancien du serveur s'il existe
      				if(isset($_POST['current-image'])){
      					unlink('../img/article/' . $_POST['current-image']);
      				}

                      $new_file_name = md5(rand());
                      $destination = '../img/article/' . $new_file_name . '.' . $my_file_extension;
                      $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

                      $query = $db->prepare('UPDATE article SET
      					image = :image
      					WHERE id = :id'
                      );
                      $resultUpdateImage = $query->execute(
                          [
                              'image' => $new_file_name . '.' . $my_file_extension,
                              'id' => $_POST['id']
                          ]
                      );
                  }
              }

              header('location:article-list.php');
              exit;
          }
      	else{
      		$message = 'Erreur.';
      	}
      }




    }
    if(isset($_GET['article_id']) && isset($_GET['action']) && $_GET['action'] == 'edit'){
      $query = $db->prepare('SELECT * FROM article WHERE id = ?');
        $query->execute(array($_GET['article_id']));
      //$article contiendra les informations de l'article dont l'id a été envoyé en paramètre d'URL
      $article = $query->fetch();
    }
?>
