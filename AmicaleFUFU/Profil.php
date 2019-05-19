<!DOCTYPE html>
<html>
	<head>
		<title>Projet Mousset</title>
		<link rel="stylesheet" href="mystyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<div class="header"><h1><p>Profil</p></h1></div>
		<div class="topnav">
			<li><b><a  href="index.php">Accueil</a></b></li>
			<li><b><a href="Recette.php">Recettes</a></b></li>
			<li><b><a class="active" href="Profil.php">Mon Profil</a></b></li>
		</div>
		
<?php
session_start ();

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=solibio_bdd_true;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$test = $bdd-> query('Select id,nom,prenom,mail,PP from utilisateurmdp');


while ($donnees = $test->fetch())
{
	$src = "PP/".$donnees['PP'];

	if ($donnees['id'] == $_SESSION['id'])
	{
		?>
		<div class="pp">
		<?php
		echo '<img src="'.$src.'" >';
		?>
		</div>
		<div class="profil">
		<?php
		echo 'Prénom : '.$donnees['prenom'].'<br>'; 		
		
		echo 'Nom : '.$donnees['nom'].'<br>';
		
		echo 'Mail : '.$donnees['mail'].'<br>';
		?>
		<br></br>
			<a href="test.php">test</a><br>
			<a href="Deconnexion.php">Deconnexion</a><br>
			<a href="Profil_modifier_prenom.php">Modifier son prénom</a><br>
			<a href="Profil_modifier_nom.php">Modifier son nom</a><br>
			<a href="Profil_modifier_mail.php">Modifier son mail</a><br />
			<a href="test_up.html">Modifier sa photo de profil</a>
		</div>
		<?php
	}		
}?>
			<div class="footer" style="position: fixed;"><p class="pdp">Pied de page :)</p></div>
	</body>
</html>