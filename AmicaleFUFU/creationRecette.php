<!DOCTYPE html>
<html>
	<head>
		<title>Projet Mousset</title>
		<link rel="stylesheet" href="mystyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<div class="header"><h1><p>Bienvenue sur un site de recettes</p></h1></div>
		<div class="topnav">
			<li><b><a href="index.php">Accueil</a></b></li>
			<li><b><a class="active" href="Recette.php">Recettes</a></b></li>
			<li><b><a href="Profil.php">Mon Profil</a></b></li>
			<form style="float:right; margin-top:5px" action="action_connexion.php" method="post">
			  <input type="text" name="mail" placeholder="Mail"><br />
			  <input type="password" name="motDePasse" placeholder="Mot de passe"><br />
			  <button class="button" type="submit">Connexion</button>		  
			  <a href="Inscription.html"class="pas_inscrit"><p>Pas encore inscrit ?</p></a>
			</form>
		</div>
		<div class="rightcolumn">
			<div class="card">
				<form action="/action_page.php">
					<input type="text" name="recherche" placeholder="Chercher une recette...">
					<button type="submit" class="recherche">Recherche</button>
				</form>
			</div>
		</div>
		<?php 
		session_start ();
		if(isset($_SESSION['id']))
		{
			?>
		<div class="leftcolumn">
			<div class="card">
				<form action="Recette_action.php" method="post" enctype="multipart/form-data">
					<input class="titre" type="text" name="titre" placeholder="Titre de la recette" required>
					<input type="file" name="photo" id="photo" required>				
					<input class="temps" type="text" name="temps_necessaire" placeholder="temps_necessaire" required><br />
					<input class="ingredient" type="text" name="ingredient1" placeholder="Ingredient 1" required><br />
					<input class="ingredient" type="text" name="ingredient2" placeholder="Ingredient 2"><br />
					<input class="ingredient" type="text" name="ingredient3" placeholder="Ingredient 3"><br />
					<input class="ingredient" type="text" name="ingredient4" placeholder="Ingredient 4"><br />
					<input class="ingredient" type="text" name="ingredient5" placeholder="Ingredient 5"><br />
					<input class="ingredient" type="text" name="ingredient5" placeholder="Ingredient 6"><br />
					<input class="ingredient" type="text" name="ingredient5" placeholder="Ingredient 7"><br />
					<input class="ingredient" type="text" name="ingredient5" placeholder="Ingredient 8"><br />
					<textarea class="preparation" style="margin-bottom: 10px"type="text" name="preparation" placeholder="Preparation..." required></textarea> 
					<button type="submit" style="margin-left: 45%;">Validation</button>
				</form>
			</div>
		</div>
		<div class="footer" ><p class="pdp">Pied de page :)</p></div>
		<?php
		}
		else
		{ 
			echo '<br>'."Vous ne pouvez pas créer de recette si vous n'êtes pas connecté.".'<br>'."Veuillez vous connectez ou créer un compte pour pouvoir créer une recette.";
			?>
			<div class="footer" style="position: fixed;"><p class="pdp">Pied de page :)</p></div>
			<?php
		}
		?>
		
	</body>
</html>