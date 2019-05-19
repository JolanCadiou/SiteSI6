 <!DOCTYPE html>
<html>
	<head>
		<title>Projet Mousset</title>
		<link rel="stylesheet" href="mystyle.css">
	</head>
	<body>
		<ul>
		  <li><b><a class="active" href="index.html">Accueil</a></b></li>
		  <li><b><a href="Recette.html">Recettes</a></b></li>
		  <li><b><a href="Contact.html">Contact</a></b></li>
		  <form style="float:right" action="action_connexion.php" method="post">
		  	<input type="text" name="mail" placeholder="Mail"><br />
		  	<input type="password" name="mdp" placeholder="Mot de passe"><br />
		  	<button type="submit" style="float:center">Connexion</button>		  
		  	<a href="Inscription.html"style="float:right ; height: 10px ; color: white"><p>Pas encore inscrit ?</p></a>
		  </form>
		</ul>
		<h1><p>Bienvenue sur un site de recettes</p></h1>
	</body>
</html>

		
<?php
session_start();
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=solibio_bdd_true;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$test = $bdd-> query('Select id,mail,mdp from utilisateurmdp');

while ($donnees = $test->fetch())
{
  
	if ($_POST['mail'] == $donnees['mail'] && md5($_POST['mdp']) == $donnees['mdp'] ) // il faudra mettle mail
	{	
		$_SESSION['id'] = $donnees['id'];
		$_SESSION['mail'] = $_POST['mail'];
		$_SESSION['mdp'] = md5($_POST['mdp']);

	}

}

$test->closeCursor(); // Termine le traitement de la requête
header('location: Profil.php');



?>

	</body>
</html>
