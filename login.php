<?php include_once 'inc/connexion_bd.inc.php';

$pseudo = (!empty($_POST['pseudo'])) ? trim(strip_tags($_POST['pseudo'])) : '';

if (isset($_POST['confirm'])) {
	
}

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
					<input type="password" name="mdp" id="mdp">

					<input type="submit" name="confirm" value="Connexion"> 
				</form>
			</section>
		</main>
	</body>
</html>	
