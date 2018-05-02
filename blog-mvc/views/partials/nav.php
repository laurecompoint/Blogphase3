
<nav class="col-3 py-2 categories-nav">

	<b>Catégories :</b>
	<ul>
		<li><a href="index.php?page=article_list">Tous les articles</a></li>
		<!-- liste des catégories -->
		<?php foreach($categories as $category): ?>
		<li><a href="index.php?page=article_list&category_id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
		<?php endforeach; ?>

	</ul>
	<a href="index.php?page=user"> <button  type="button" class="btn btn-primary">Connection</button></a>
	<a href="admin/index.php?"> <button  type="button" class="btn btn-primary">Admin</button></a>
</nav>
