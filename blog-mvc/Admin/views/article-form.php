<!DOCTYPE html>
<html>
	<head>

		<title>Administration des articles - Mon premier blog !</title>

		<?php require 'partials/head_assets.php'; ?>

	</head>
	<body class="index-body">
		<div class="container-fluid">

			<?php require 'partials/header.php'; ?>

			<div class="row my-3 index-content">

				<?php require 'partials/nav.php'; ?>

				<section class="col-9">
					<header class="pb-3">
						<!-- Si $article existe, on affiche "Modifier" SINON on affiche "Ajouter" -->
						<h4><?php if(isset($article)): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> un article</h4>
					</header>
					<?php if(isset($message)): //si un message a été généré plus haut, l'afficher ?>
					<div class="bg-danger text-white">
						<?php echo $message; ?>
					</div>
					<?php endif; ?>

					<!-- Si $article existe, chaque champ du formulaire sera pré-remplit avec les informations de l'article -->
					<form action="index.php?pageadmin=article-form" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for="title">Titre :</label>
							<input class="form-control" <?php if(isset($article)): ?>value="<?php echo htmlentities($article['title']); ?>"<?php endif; ?> type="text" placeholder="Titre" name="title" id="title" />
						</div>
						<div class="form-group">
							<label for="content">Contenu :</label>
							<textarea class="form-control" name="content" id="content" placeholder="Contenu"><?php if(isset($article)): ?><?php echo htmlentities($article['content']); ?><?php endif; ?></textarea>
						</div>
						<div class="form-group">
							<label for="summary">Résumé :</label>
							<input class="form-control" <?php if(isset($article)): ?>value="<?php echo htmlentities($article['summary']); ?>"<?php endif; ?> type="text" placeholder="Résumé" name="summary" id="summary" />
						</div>

						<div class="form-group">
							<label for="image">Image :</label>
							<input class="form-control" type="file" name="image" id="image" />
							<?php if(isset($article) && $article['image']): ?>
							<img class="img-fluid py-4" src="../img/article/<?php echo $article['image']; ?>" alt="" />
							<input type="hidden" name="current-image" value="<?php echo $article['image']; ?>" />
							<?php endif; ?>
						</div>

						<div class="form-group">
							<label for="category_id"> Catégorie </label>
							<select class="form-control" name="category_id" id="category_id">
								<?php
								$queryCategory= $db ->query('SELECT * FROM category');
								while($category = $queryCategory->fetch()):
								  ?>
									<option value="<?php echo $category['id']; ?>" <?php if(isset($article) && $article['category_id'] == $category['id']): ?>selected<?php endif; ?>> <?php echo $category['name']; ?> </option>

								<?php endwhile; ?>

							</select>
						</div>

						<div class="form-group">
							<label for="is_published"> Publié ?</label>
							<select class="form-control" name="is_published" id="is_published">
								<option value="0" <?php if(isset($article) && $article['is_published'] == 0): ?>selected<?php endif; ?>>Non</option>
								<option value="1" <?php if(isset($article) && $article['is_published'] == 1): ?>selected<?php endif; ?>>Oui</option>
							</select>
						</div>


					  <div class="text-right">
						<!-- Si $article existe, on affiche un lien de mise à jour -->
						<?php if(isset($article)): ?>
						<input class="btn btn-success" type="submit" name="update" value="Mettre à jour" />
						<!-- Sinon on afficher un lien d'enregistrement d'un nouvel article -->
						<?php else: ?>
						<input class="btn btn-success" type="submit" name="save" value="Enregistrer" />
						<?php endif; ?>
					  </div>

					  <!-- Si $article existe, on ajoute un champ caché contenant l'id de l'article à modifier pour la requête UPDATE -->
					  <?php if(isset($article)): ?>
					  <input type="hidden" name="id" value="<?php echo $article['id']; ?>" />
					  <?php endif; ?>

					</form>
				</section>
			</div>

		</div>
  </body>
</html>
