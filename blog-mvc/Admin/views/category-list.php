<!DOCTYPE html>
<html>
	<head>
		<title>Administration des catégories - Mon premier blog !</title>
		<?php require 'partials/head_assets.php'; ?>
	</head>
	<body class="index-body">
		<div class="container-fluid">

			<?php require 'partials/header.php'; ?>

			<div class="row my-3 index-content">

				<?php require 'partials/nav.php'; ?>

				<section class="col-9">
					<header class="pb-4 d-flex justify-content-between">
						<h4>Liste des catégories</h4>
						<a class="btn btn-primary" href="index.php?pageadmin=user-form">Ajouter une catégorie</a>
					</header>

					<?php if(isset($message)): //si un message a été généré plus haut, l'afficher ?>
					<div class="bg-success text-white p-2 mb-4">
						<?php echo $message; ?>
					</div>
					<?php endif; ?>

					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							<?php if($categories): ?>
							<?php foreach($categories as $category): ?>

							<tr>
								<!-- htmlentities sert à écrire les balises html sans les interpréter -->
								<th><?php echo htmlentities($category['id']); ?></th>
								<td><?php echo htmlentities($category['name']); ?></td>
								<td><?php echo htmlentities($category['description']); ?></td>
								<td>
									<a href="index.php?pageadmin=user-form?category_id=<?php echo $category['id']; ?>&action=edit" class="btn btn-warning">Modifier</a>
									<a onclick="return confirm('Are you sure?')" href="index.php?pageadmin=category-list?category_id=<?php echo $category['id']; ?>&action=delete" class="btn btn-danger">Supprimer</a>
								</td>
							</tr>

							<?php endforeach; ?>
							<?php else: ?>
								Aucune catégorie enregistré.
							<?php endif; ?>

						</tbody>
					</table>

				</section>

			</div>

		</div>
	</body>
</html>
