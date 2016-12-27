<?php require_once 'inc/connexion_bd.inc.php';

// Inscription d'un membre dans la bdd
$prenom = (!empty($_POST['firstname'])) ? trim(strip_tags($_POST['firstname'])) : '';
$nom = (!empty($_POST['name'])) ? trim(strip_tags($_POST['name'])) : '';
$email = (!empty($_POST['email'])) ? trim(strip_tags($_POST['email'])) : '';
$genre = (!empty($_POST['gender'])) ? trim(strip_tags($_POST['gender'])) : '';
$age = (!empty($_POST['age'])) ? trim(strip_tags($_POST['age'])) : '';
$pseudo_ins = (!empty($_POST['ins_pseudo'])) ? trim(strip_tags($_POST['ins_pseudo'])) : '';
$mdp_ins = (!empty($_POST['ins_mdp'])) ? trim(strip_tags($_POST['ins_mdp'])) : '';

if (isset($_POST['confirm_inscription'])) {

	if (!empty($prenom) && !empty($nom) && !empty($email) && !empty($genre) && !empty($age) 
		&& !empty($pseudo_ins) && !empty($mdp_ins)) {

		$new_member = $fnetwork->prepare('INSERT INTO membres(prenom, nom, email, genre, age, pseudo, mdp) 			VALUES (:prenom,:nom,:email,:genre,:age,:pseudo,:mdp)');

		$new_member->bindValue(':prenom',$prenom,PDO::PARAM_STR);
		$new_member->bindValue(':nom',$nom,PDO::PARAM_STR);
		$new_member->bindValue(':email',$email,PDO::PARAM_STR);
		$new_member->bindValue(':genre',$genre,PDO::PARAM_STR);
		$new_member->bindValue(':age',$age,PDO::PARAM_STR);
		$new_member->bindValue(':pseudo',$pseudo_ins,PDO::PARAM_STR);
		$new_member->bindValue(':mdp',$mdp_ins,PDO::PARAM_STR);
		$new_member->execute();
	}
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
					<input type="password" name="mdp_to_confirm" id="mdp" >

					<input type="submit" name="confirm" value="Connexion"> 
				</form>
			</section>

			<!-- Partie formulaire d'inscription -->
			<section>
				<form action="signup.php" method= "POST">

					<label for="prenom">Prénom</label>
					<input type="text" name="firstname" id="prenom">

					<label for="nom">nom</label>
					<input type="text" name="name" id="nom">

					<label for="email">Email</label>
					<input type="text" name="email" id="email">

					<label for="homme">Homme</label>
					<input type="radio" value="homme" name="gender" id="homme">

					<label for="femme">Femme</label>
					<input type="radio" value="femme" name="gender" id="femme">

					<label for="age">Age</label>
					<input type="integer" name="age" id="age">

					<label for="new_pseudo">Choisissez un pseudo</label>
					<input type="text" name="ins_pseudo" id="new_pseudo">

					<label for="choose_mdp">Choisissez un mot de passe</label>
					<input type="password" name="new_mdp" id="choose_mdp" >

					<label for="choose_mdp2">Confirmez votre mot de passe</label>
					<input type="password" name="new_mdp" id="choose_mdp2" >

					<input type="submit" name="confirm_inscription" value="Inscription">
				</form>
			</section>
		</main>
	</body>
</html>