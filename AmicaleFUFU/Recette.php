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
			  <input type="text" name="mail" placeholder="Mail"required><br />
			  <input type="password" name="mdp" placeholder="Mot de passe"required><br />
			  <button class="button" type="submit">Connexion</button> 
			  <a href="Inscription.html" class="pas_inscrit"><p>Pas encore inscrit ?</p></a>
			</form>
		</div>
		<div class="rightcolumn">
			<div class="card">
				<form action="/action_page.php">
					<input type="text" name="recherche" placeholder="Chercher une recette...">
					<button type="submit" class="recherche">Recherche</button><br />
					<button><a href="creationRecette.html" class="creer_recette">Creer une recette</a></button>
				</form>
			</div>
		</div>
		<?php 
		session_start();
		$id ="";
		try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=solibio_bdd_true;charset=utf8', 'root', '');
			}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}


		$aff = $bdd-> query('select id,titre,temps_necessaire, photo from recette
							order by id desc');

		while ($donnees = $aff->fetch())
		{
			$src = "Recette_Image/".$donnees['photo'];
			$id = $donnees['id'];
			?>
			<div class="leftcolumn">
				<div class="card">
					<?php echo '<a href="detail.php?id='.$id.'">'.$donnees['titre'].'</a>';?>
					<div class="img" style="height:200px"><?php echo '<img src="'.$src.'" >';?></div>
					<?php echo $donnees['temps_necessaire'].'<br>';
					?>
				</div>
			</div>
		<?php
		}

		$aff->closeCursor(); // Termine le traitement de la requête
		
		?>
		<div class="footer"><p class="pdp">Pied de page :)</p></div>
	</body>
</html>