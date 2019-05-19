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
		

$detail = $bdd-> query('select id,titre,temps_necessaire,ingredient1,photo,note,idcommentaires,ingredient2,ingredient3,ingredient4,ingredient5 from recette
							order by id desc');

		while ($donnees = $detail->fetch())
		{
			$src = "Recette_Image/".$donnees['photo'];
					echo $donnees['titre'];
					echo '<img src="'.$src.'" >';
				    echo $donnees['temps_necessaire'].'<br>';
					echo $donnees['ingredient1'].'<br>';
					echo $donnees['ingredient2'].'<br>';
					echo $donnees['ingredient3'].'<br>';
					echo $donnees['ingredient4'].'<br>';
					echo $donnees['ingredient5'].'<br>';
					echo $donnees['note'];
					
					
		}

		$aff->closeCursor(); // Termine le traitement de la requête



?>