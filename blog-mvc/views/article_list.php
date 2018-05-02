<!DOCTYPE html>
<html>
<head>
    <!-- si on affiche une catégorie, affichage de son nom, sinon affichage de "tous les articles" -->
    <title><?php if(isset($currentCategory)): ?><?php echo $currentCategory['name']; ?><?php else : ?>Tous les articles<?php endif; ?> - Mon premier blog !</title>

    <?php require 'partials/head_assets.php'; ?>

</head>
<body class="article-list-body">
<div class="container-fluid">

    <?php require 'partials/header.php'; ?>

    <div class="row my-3 article-list-content">

        <?php require('partials/nav.php'); ?>

        <main class="col-9">
            <section class="all_aricles">
                <header>
                    <!-- si on affiche une catégorie, affichage de son nom, sinon affichage de "tous les articles" -->
                    <h1 class="mb-4"><?php if(isset($currentCategory)): ?><?php echo $currentCategory['name']; ?><?php else : ?>Tous les articles<?php endif; ?> :</h1>
                </header>

                <!-- si on affiche une catégorie, affichage d'une div contenant sa description -->
                <?php if(isset($currentCategory)): ?>
                    <div class="category-description mb-4">
                        <?php echo $currentCategory['description']; ?>
                    </div>
                <?php endif; ?>

                <!-- s'il y a des articles à afficher -->
                <?php if(!empty($articles)): ?>

                    <?php foreach($articles as $key => $article): ?>
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
                                    <!-- Si nous n'affichons pas une catégorie en particulier, je souhaite que le nom de la catégorie de chaque article apparaisse à côté de la date -->
                                    <?php if(!isset($currentCategory)): ?>
                                        <b class="article-category">[<?php echo $article['categories']; ?>]</b>
                                    <?php endif; ?>
                                    <span class="article-date">Créé le <?php echo $article['created_at']; ?></span>
                                    <div class="article-content">
                                        <?php echo $article['summary']; ?>
                                    </div>
                                    <a href="index.php?page=article&article_id=<?php echo $article['id']; ?>">> Lire l'article</a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>

                <?php else: ?>
                    <!-- s'il n'y a pas d'articles à afficher (catégorie vide ou aucun article publié) -->
                    Aucun article dans cette catégorie...
                <?php endif; ?>
            </section>
        </main>

    </div>

    <?php require 'partials/footer.php'; ?>

</div>
</body>
</html>
