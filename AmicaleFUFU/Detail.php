<!DOCTYPE html>
<html>
	<head>
		<title>Solibio</title>
		<link rel="stylesheet" href="mystyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<div class="header"><h1><p>Recettes</p></h1></div>
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
		<div class="voir_recette">
			<div class="card">
				<?php 
session_start();
$id = $_GET['id'];

try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=solibio_bdd_true;charset=utf8', 'root', '');
			}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
		

$detail = $bdd-> query('select id,titre,preparation,temps_necessaire,ingredient1,photo,note,idcommentaires,ingredient2,ingredient3,ingredient4,ingredient5 from recette');

		while ($donnees = $detail->fetch())
		{
			if($donnees['id'] == $id)
			{
				$src = "Recette_Image/".$donnees['photo'];?>
				<div class="titre2">
					<b>
					<?php
						echo $donnees['titre'].'<br>';
					?>
					</b>
				</div>
				<div class="image">
					<?php
					echo '<img src="'.$src.'" >';
					?>
				</div>
					<?php
				    echo "Temps_necessaire : ".$donnees['temps_necessaire'].'<br>';

					echo "Ingredient 1 : ".$donnees['ingredient1'].'<br>';
					
					if(strlen($donnees['ingredient2']) != 0)
					{
					echo "Ingredient 2 : ".$donnees['ingredient2'].'<br>';
					}
					if(strlen($donnees['ingredient3']) != 0)
					{
					echo "Ingredient 3 : ".$donnees['ingredient3'].'<br>';
					}
					if(strlen($donnees['ingredient4']) != 0)
					{
					echo "Ingredient 4 : ".$donnees['ingredient4'].'<br>';
					}
					if(strlen($donnees['ingredient5']) != 0)
					{
					echo "Ingredient 5 : ".$donnees['ingredient5'].'<br>';
					}?>
						<div class="preparation2">
							<?php
								echo "Preparation : ".$donnees['preparation'].'<br>';
							?>
						</div>
					<?php
					echo $donnees['note'].'<br>';
					
			}
					
		}

		$detail->closeCursor(); // Termine le traitement de la requête
		?>
<div style="margin-top: 15%">
<?php		
echo "Commentaire : ".'<br>';
?>
</div>
<form action="commentaire.php?id=" method="post" >			
	<textarea class="commentaire" type="text" name="comm" placeholder="Tapez ici votre commentaire : " required></textarea> 
	<input type="hidden" name="idt" value="<?php echo "".$id."" ?>"></input>
	<button class="button2" type="submit">Validation</button>
</form>
				
<?php 

$com = $bdd-> query('select contenu,nom,prenom,idrecette from commentaire,utilisateurmdp
where iduser=utilisateurmdp.id
');
while ($donne = $com->fetch())
		{
			if($donne['idrecette'] == $id)
			{
				// if($donne['iduser'] == $se
				?>
				<div class="commentaire2">
				<?php
				echo $donne['nom']." ".$donne['prenom']." : ".'<br>';

				echo $donne['contenu'].'<br>';
				?>
				</div>
				<?php
			}
		}
		$com -> closeCursor();



?>
			</div>
		</div>
		<div class="footer"><p class="pdp">Pied de page :)</p></div>
	</body>
</html>


