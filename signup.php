<?php
$DSN = 'mysql:host=localhost;dbname=network';
$user= 'root';
$mdp = '';
$options = [
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
];

$fnetwork = new PDO($DSN,$user,$mdp,$options);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Connexion</title>
	</head>

	<body>
		<main>
			<form action="connexion.php" method="POST">
				<label>Pseudo</label><input type="text" name="pseudo">
				<label>Mot de passe</label><input type="text" name="pseudo">
			</form>
		</main>
		
	</body>
</html>