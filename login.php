<?php
include_once 'inc/connexion_bd.inc.php';

$pseudo = (!empty($_POST['pseudo'])) ? trim(strip_tags($_POST['pseudo'])) : '';
$password = (!empty($_POST['mdp'])) ? trim(strip_tags($_POST['mdp'])) : '';
$check_connection = '';

// connection processing
if (isset($_POST['connexion'])) {
	if (!empty($pseudo) && !empty($password)) {

		$check_connection = $ournetwork->prepare('SELECT * FROM membres WHERE pseudo = :pseudo');


		$check_connection->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
		$check_connection->execute();

		$user_connection = $check_connection->fetch(PDO::FETCH_ASSOC);

		 if (password_verify($password, $user_connection['mdp'])) {
		 	session_start();
			$_SESSION['pseudo'] = $user_connection['pseudo'];
			header('location:index.php');

		 }
	}
	
}

// if (!$check_connection) {
// 	echo 'erreur...';
// }



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
			<section>
				<form action="login.php" method="post">

					<label for="pseudo">Pseudo</label>
					<input type="text" name="pseudo" id="pseudo">

					<label for="mdp">Mot de passe</label>
					<input type="password" name="mdp" id="mdp">

					<input type="submit" name="connexion" value="Connexion"> 
				</form>
			</section>
		</main>
	</body>
</html>	
