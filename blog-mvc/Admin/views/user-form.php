
<!DOCTYPE html>
<html>
	<head>

		<title>Administration des utilisateurs - Mon premier blog !</title>

		<?php require 'partials/head_assets.php'; ?>

	</head>
	<body class="index-body">
		<div class="container-fluid">

			<?php require 'partials/header.php'; ?>

			<div class="row my-3 index-content">

				<?php require 'partials/nav.php'; ?>

				<section class="col-9">
					<header class="pb-3">
						<!-- Si $user existe, on affiche "Modifier" SINON on affiche "Ajouter" -->
						<h4><?php if(isset($user)): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> un utilisateur</h4>
					</header>

					<?php if(isset($message)): //si un message a été généré plus haut, l'afficher ?>
					<div class="bg-danger text-white">
						<?php echo $message; ?>
					</div>
					<?php endif; ?>

					<!-- Si $user existe, chaque champ du formulaire sera pré-remplit avec les informations de l'utilisateur -->

					<form action="user-form" method="post">
						<div class="form-group">
							<label for="firstname">Prénom :</label>
							<input class="form-control" <?php if(isset($user)): ?>value="<?php echo $user['firstname']?>"<?php endif; ?> type="text" placeholder="Prénom" name="firstname" id="firstname" />
						</div>
						<div class="form-group">
							<label for="lastname">Nom de famille : </label>
							<input class="form-control" <?php if(isset($user)): ?>value="<?php echo $user['lastname']?>"<?php endif; ?> type="text" placeholder="Nom de famille" name="lastname" id="lastname" />
						</div>
						<div class="form-group">
							<label for="email">Email :</label>
							<input class="form-control" <?php if(isset($user)): ?>value="<?php echo $user['email']?>"<?php endif; ?> type="email" placeholder="Email" name="email" id="email" />
						</div>
						<div class="form-group">
							<label for="password">Password : </label>
							<input class="form-control" <?php if(isset($user)): ?>value="<?php echo $user['password']?>"<?php endif; ?> type="password" placeholder="Mot de passe" name="password" id="password" />
						</div>
						<div class="form-group">
							<label for="bio">Biographie :</label>
							<textarea class="form-control" name="bio" id="bio" placeholder="Sa vie son oeuvre..."><?php if(isset($user)): ?><?php echo $user['bio']?><?php endif; ?></textarea>
						</div>
						<div class="form-group">
							<label for="is_admin"> Admin ?</label>
							<select class="form-control" name="is_admin" id="is_admin">
								<option value="0" <?php if(isset($user) && $user['is_admin'] == 0): ?>selected<?php endif; ?>>Non</option>
								<option value="1" <?php if(isset($user) && $user['is_admin'] == 1): ?>selected<?php endif; ?>>Oui</option>
							</select>
						</div>

						<div class="text-right">
							<!-- Si $user existe, on affiche un lien de mise à jour -->
							<?php if(isset($user)): ?>
							<input class="btn btn-success" type="submit" name="update" value="Mettre à jour" />
							<!-- Sinon on afficher un lien d'enregistrement d'un nouvel utilisateur -->
							<?php else: ?>
							<input class="btn btn-success" type="submit" name="save" value="Enregistrer" />
							<?php endif; ?>
						</div>

						<!-- Si $user existe, on ajoute un champ caché contenant l'id de l'utilisateur à modifier pour la requête UPDATE -->
						<?php if(isset($user)): ?>
						<input type="hidden" name="id" value="<?php echo $user['id']?>" />
						<?php endif; ?>

					</form>
				</section>
			</div>

		</div>
	</body>
</html>
