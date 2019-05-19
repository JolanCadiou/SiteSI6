<!DOCTYPE html>
<html>
	<head>
		<title>Projet Mousset</title>
		<link rel="stylesheet" href="mystyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<div class="header"><h1><p>Bienvenue sur votre profil</p></h1></div>
		<div class="topnav">
		  <li><b><a href="index.php">Accueil</a></b></li>
		  <li><b><a href="Recettes.php">Recettes</a></b></li>
		  <li><b><a class="active" href="Profil.php">Mon Profil</a></b></li>
		  <form style="float:right; margin-top:5px" action="action_connexion.php" method="post">
			  <input style="margin-right: 40px;" type="text" name="mail" placeholder="Mail" required><br />
			  <input style="margin-right: 40px;" type="password" name="motDePasse" placeholder="Mot de passe" required><br />
			  <button type="submit" class="button">Connexion</button>	  
			</form>
		</div>
		
		
		<?php
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=solibio_bdd_true;charset=utf8', 'root', '');
		}
		catch(Exception $e)
		{
        		die('Erreur : '.$e->getMessage());
		}

		try {
				$req = $bdd->prepare('INSERT INTO utilisateurmdp(nom, prenom, mdp, mail ) VALUES(:nom, :prenom, :mdp, :mail)');
				$req -> execute(array(
				'nom' =>  htmlspecialchars($_POST['nom']),
				'prenom' =>  htmlspecialchars($_POST['prenom']),
				'mail' => htmlspecialchars($_POST['mail']),
				'mdp' => md5($_POST['mdp'])
		
		
		
				));
			}
		
		catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
			echo 'ça ne marche pas';
			}
			header('location: Index.php');
		?>
			<div class="footer"style="position: fixed;"><p class="pdp">Pied de page :)</p></div>
	</body>
</html>
