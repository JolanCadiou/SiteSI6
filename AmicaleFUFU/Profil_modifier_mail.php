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


$test = $bdd-> query('Select id,mail from utilisateurmdp');
function Bonjour()
{echo "hello";}



while ($donnees = $test->fetch())
{

	if ($donnees['id'] == $_SESSION['id'])
	{
		echo 'Mail : '.$donnees['mail'].'<form action="Profil_modifier_action_mail.php"  method="post">
				<br />
			  	<input style="width: 200px; height: 30px;" type="text" name="mail" placeholder="mail" value="" min="0" max="20" >
				</form>';
	}
		
}