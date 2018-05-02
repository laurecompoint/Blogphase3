<!DOCTYPE html>
<html>
 <head>

	<title><?php echo $article['title']; ?> - Mon premier blog !</title>

  <?php require 'partials/head_assets.php'; ?>


 </head>
 <body class="article-body">
	<div class="container-fluid">

    <?php require 'partials/header.php'; ?>

		<div class="row my-3 article-content">

      <?php require 'partials/nav.php'; ?>

			<main class="col-9">
				<article>
					<?php if(!empty($article['image'])): ?>
					<img class="pb-4 img-fluid" src="img/article/<?php echo $article['image']; ?>" alt="<?php echo $article['title']; ?>" />
					<?php endif; ?>
					<h1 class="h3"><?php echo $article['title']; ?></h1>
					<b class="article-category">[<?php echo $article['categories']; ?>]</b>
					<span class="article-date">Créé le <?php echo $article['created_at']; ?></span>
					<div class="article-content">
						<?php echo $article['content']; ?>
					</div>
				</article>

        <div class="row d-flex justify-content-center mt-5" id="avis">

 	<div class="col-md-7">

 	<h5>Commentaire</h5>



 <?php if(!empty($commentaire)) : ?>

 <?php foreach ($commentaire as $key => $value):?>
 <div class="col-12 row view">

 	<div class="mt-3 col-md-9 bg-white border borderdark">
 	<p><?php echo $value['date']; ?></p>
 	<p class="text-secondary">Posté le : <?php echo $value['created_at']; ?></p>
 	<p><?php echo $value['comment']; ?></p>

 	</div>
 </div>

 <?php endforeach ?>
 <?php else: ?>
 Pas encore de commentaire pour cet article
 <?php endif;?>




 	</div>


 	<div class="col-md-3 d-flex justify-content-end">


 	 <form class="d-flex flex-column m-auto align-items-center" action="dvd_serie.php?dvd_serie_id=<?php echo $dvd_serie['id'];?>" method="post">

 			<h5>Laisser un commentaire</h5>

 			<?php if(isset($message)): ?>
 			<div class="bg-danger text-white">
 				<?php echo $message; ?>
 			</div>
 			<?php endif; ?>


 			<input class="mt-5" type="text" name="speudo" value="" placeholder="Speudo" /> <br>
 			<input type="text" name="objet" value="" placeholder="Objet" /> <br>
 			<input type="text" name="avis" value="" placeholder="Votre avis" /> <br>
 			<input type="hidden" name="is_published" value="1" placeholder="is_published" /> <br>
 			<input type="hidden" name="categories[]" value="<?php echo $dvd_serie['id']; ?>" placeholder="is_published" />


 			 <input type="submit" name="save" class="button" value="Envoyer" />




 	 </form>

 	</div>


 </div>


			</main>

		</div>

    <?php require 'partials/footer.php'; ?>


	</div>
 </body>
</html>
