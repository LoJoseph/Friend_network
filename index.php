<?php 
session_start();
include_once 'inc/connexion_bd.inc.php';

if (!isset($_SESSION['pseudo'])) {
	header('location:login.php');
	exit();
}

$pseudo = $_SESSION['pseudo'];
$check_connection = $ournetwork->prepare('SELECT * FROM membres WHERE pseudo = :pseudo');

$check_connection->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
$check_connection->execute();

$user_connection = $check_connection->fetchAll(PDO::FETCH_ASSOC);

foreach ($user_connection as $value) {
	$_SESSION['prenom'] = $value['prenom'];
	$_SESSION['age'] = $value['age'];
}

echo '<p>hello ' . $_SESSION['pseudo'] .'! Vous êtes online!!</p>';
echo '<p> Votre prénom est ' . $_SESSION['prenom'] . '!</p>';
echo '<p> et vou avez ' . $_SESSION['age'] . ' ans!</p>';

if (isset($_POST['end_session'])) {
	session_destroy();
	header('location:login.php');
	exit();
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil</title>
	</head>

	<body>
	<form action="index.php" method="post">
		<input type="submit" name="end_session" value="Déconnection">
	</form>

	</body>
</html>
