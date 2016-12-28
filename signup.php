<?php
include 'inc/connexion_bd.inc.php'
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Inscription</title>
	</head>

	<body>
		<header>
	
		</header>

		<main>
			
			<!-- Partie formulaire d'inscription -->
			<section>
				<form action="signup.php" method="post">

					<label for="prenom">Prénom</label>
					<input type="text" name="firstname" id="prenom"><br>

					<label for="nom">nom</label>
					<input type="text" name="name" id="nom"><br>

					<label for="email">Email</label>
					<input type="email" name="email" id="email"><br>

					<label for="homme">Homme</label>
					<input type="radio" value="homme" name="gender" id="homme"><br>

					<label for="femme">Femme</label>
					<input type="radio" value="femme" name="gender" id="femme"><br>

					<label for="age">Age</label>
					<input type="number" name="age" id="age"><br>

					<label for="new_pseudo">Choisissez un pseudo</label>
					<input type="text" name="ins_pseudo" id="new_pseudo"><br>

					<label for="choose_mdp">Choisissez un mot de passe</label>
					<input type="password" name="mdp" id="choose_mdp" ><br>

<!-- 					<label for="choose_mdp2">Confirmez votre mot de passe</label>
					<input type="password" name="new_mdp2" id="choose_mdp2" > -->

					<input type="submit" name="confirm" value="Inscription">
				</form>
			</section>
		</main>
	</body>
</html>

<?php
// Inscription d'un membre dans la bdd
$prenom = (!empty($_POST['firstname'])) ? trim(strip_tags($_POST['firstname'])) : '';
$nom = (!empty($_POST['name'])) ? trim(strip_tags($_POST['name'])) : '';
$email = (!empty($_POST['email'])) ? trim(strip_tags($_POST['email'])) : '';
$genre = (!empty($_POST['gender'])) ? trim(strip_tags($_POST['gender'])) : '';
$age = (!empty($_POST['age'])) ? trim(strip_tags($_POST['age'])) : '';
$pseudo_ins = (!empty($_POST['ins_pseudo'])) ? trim(strip_tags($_POST['ins_pseudo'])) : '';
$mdp_ins = (!empty($_POST['mdp'])) ? trim(strip_tags($_POST['mdp'])) : '';

$test = 'données enregistrées';

if (isset($_POST['confirm'])) {

	if (!empty($prenom) && !empty($nom) && !empty($email) && !empty($genre) && !empty($age) 
		&& !empty($pseudo_ins) && !empty($mdp_ins)) {

		if(strlen($pseudo_ins) > 3 && strlen($mdp_ins) > 3){
			$check_pseudo = $ournetwork->prepare('SELECT pseudo FROM membres 
											WHERE pseudo = :pseudo');
			$check_pseudo->bindValue(':pseudo',$pseudo_ins,PDO::PARAM_STR);
			$check_pseudo->execute();

			if ($check_pseudo->rowCount()>0) {
				echo '<p>Désolé, ce pseudo est déjà utilisé, veuillez en choisir un autre</p>';
			} else {

				$new_member = $ournetwork->prepare ('INSERT INTO membres (prenom, nom, email, genre, age, pseudo, mdp)	VALUES (:prenom, :nom, :email, :genre, :age, :pseudo, :mdp)');

				$new_member->bindValue(':prenom', $prenom, PDO::PARAM_STR);
				$new_member->bindValue(':nom', $nom, PDO::PARAM_STR);
				$new_member->bindValue(':email', $email, PDO::PARAM_STR);
				$new_member->bindValue(':genre', $genre, PDO::PARAM_STR);
				$new_member->bindValue(':age', $age, PDO::PARAM_INT);
				$new_member->bindValue(':pseudo', $pseudo_ins, PDO::PARAM_STR);
				$new_member->bindValue(':mdp', $mdp_ins, PDO::PARAM_STR);
				$new_member->execute();

				echo $test;	
				} 

		} else {
			$alert = 'Le pseudo et le mot de passe doivent faire au minimum 3 caractères';
			echo $alert;
		}
		
	}
}
?>
