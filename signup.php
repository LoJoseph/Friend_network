<? require_once 'inc/connexion_bd.inc.php';
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Connexion</title>
	</head>

	<body>
		<header>
	
		</header>

		<main>
			<!-- partie connexion -->
			<section>
				<form action="signup.php" method="POST">

					<label for="pseudo">Pseudo</label>
					<input type="text" name="pseudo" id="pseudo">

					<label for="mdp">Mot de passe</label>
					<input type="text" name="mdp_to_confirm" id="mdp" >

					<input type="submit" name="confirm" value="Inscription">
				</form>
			</section>

			<!-- Partie formulaire d'inscription -->
			<section>
				<form action="signup.php" method= "POST">

					<label for="prenom">Prénom</label>
					<input type="text" name="firstname" id="prenom">

					<label for="nom">nom</label>
					<input type="text" name="name" id="nom">

					<label for="homme">Homme</label>
					<input type="radio" value="homme" name="gender">

					<label for="femme">Femme</label>
					<input type="radio" value="femme" name="gender" id="femme">

					<label for="age">Age</label>
					<input type="integer" name="age" id="age">

					<label for="new_pseudo">Choisissez un pseudo</label>
					<input type="text" name="ins_pseudo" id="new_pseudo">

					<input type="submit" name="confirm_inscription" value="Inscription">
				</form>
			</section>
		</main>
	</body>
</html>