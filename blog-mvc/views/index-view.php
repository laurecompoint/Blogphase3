<!DOCTYPE html>
<html>
	<head>

		<title>Homepage - Mon premier blog !</title>



	</head>
	<body class="index-body">
		<div class="container-fluid">



			<div class="row my-3 index-content">



				<main class="col-9">
					<section class="latest_articles">
						<header class="mb-4"><h1>Les 3 derniers articles :</h1></header>

						<?php while($article = $query->fetch()): ?>
						<article class="mb-4">
							<h2 class="h3"><?php echo $article['title']; ?></h2>
							<div class="row">
								<!-- on affiche le bloc image que si le champ image de l'article n'est pas vide -->
								<?php if(!empty($article['image'])): ?>
								<div class="col-12 col-md-4 col-lg-3">
									<img class="img-fluid" src="img/article/<?php echo $article['image']; ?>" alt="<?php echo $article['title']; ?>" />
								</div>
								<?php endif; ?>
								<div class="col-12 <?php if(!empty($article['image'])): ?>col-md-8 col-lg-9<?php endif; ?>">
									<!-- ici la clé "category_name" (alias de "category.name" dans la requête) a pour valeur la nom de la catégorie -->
									<b class="article-category">[<?php echo $article['categories']; ?>]</b>
									<span class="article-date">Créé le <?php echo $article['created_at']; ?></span>
									<div class="article-content">
										<?php echo $article['summary']; ?>
									</div>
									<a href="article.php?article_id=<?php echo $article['id']; ?>">> Lire l'article</a>
								</div>
							</div>
						</article>
						<?php endwhile; ?>

						<?php $query->closeCursor(); ?>

					</section>
					<div class="text-right">
						<a href="article_list.php">> Tous les articles</a>
					</div>
				</main>
			</div>

			

		</div>
	</body>
</html>
