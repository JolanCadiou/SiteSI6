<!DOCTYPE html>
<html>
	<head>
		<title>Solibio</title>
		<link rel="stylesheet" href="mystyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<div class="header"><h1><p>Amicale Fulbert</p></h1></div>
		<div class="topnav">
			<li><b><a class="active" href="index.php">Accueil</a></b></li>
			<li><b><a href="Recette.php">Recettes</a></b></li>
			<li><b><a href="Profil.php">Mon Profil</a></b></li>
			<form style="float:right; margin-top:5px" action="action_connexion.php" method="post">
			  <input type="text" name="mail" placeholder="Mail"required><br />
			  <input type="password" name="mdp" placeholder="Mot de passe"required><br />
			  <button type="submit" class="button" style="float:center">Connexion</button>		  
			  <a href="Inscription.html"class="pas_inscrit"><p>Pas encore inscrit ?</p></a>
			</form>
		</div>
		<b><p class="bienvenue">Bienvenue sur le site de Amicale Fulbert</p></b>
		<div class="footer" style="position: fixed;"><p class="pdp">Pied de page</p></div>
	</body>
</html>