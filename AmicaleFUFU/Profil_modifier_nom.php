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


$test = $bdd-> query('Select id,nom from utilisateurmdp');
function Bonjour()
{echo "hello";}



while ($donnees = $test->fetch())
{

	if ($donnees['id'] == $_SESSION['id'])
	{
		echo 'Prénom : '.$donnees['nom'].'<form action="Profil_modifier_action_nom.php"  method="post">
				<br />
			  	<input style="width: 200px; height: 30px;" type="text" name="nom" placeholder="Nom" value="" min="0" max="20" >
				</form>';
	}
		
}