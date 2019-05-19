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
		

$detail = $bdd-> query('SELECT `ID`, `TITRE`, `TEMPS_NECESSAIRE`, `PREPARATION`, `PHOTO`, `NOTE`, `IDCOMMENTAIRES`, `INGREDIENT1`, `INGREDIENT2`, `INGREDIENT3`, `INGREDIENT4`, `INGREDIENT5` FROM `recette`');

while ($donnees = $detail->fetch())
{
	echo $donnees['titre'];

		
}



?>