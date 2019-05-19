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

if (isset($_POST['prenom']))
{
	try {
			$marche = $bdd->prepare('Update utilisateurmdp SET prenom = ? WHERE id = ?	' );
			$marche -> execute(array(
			
			$_POST['prenom'],
			$_SESSION['id']
			)	
			
			
			);
			echo "Gga";
			}
			
			catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
				echo 'ça ne marche pas';
			}
			header('location: Profil.php');
}		



?>
<a href="test.php">test</a><br>

