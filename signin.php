<?php include_once 'inc/connexion_bd.inc.php';

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
					<input type="password" name="mdp_to_confirm" id="mdp" >

					<input type="submit" name="confirm" value="Connexion"> 
				</form>
			</section>
		</main>
	</body>
</html>	
