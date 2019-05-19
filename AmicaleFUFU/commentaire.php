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




echo $_POST['idt'];
try{
		$theister = $bdd->prepare('INSERT INTO commentaire(contenu, iduser, idrecette ) VALUES(:contenu, :iduser, :idrecette)');

		$theister -> execute(array(
		'contenu' => $_POST['comm'],
		'iduser' => $_SESSION['id'],
		'idrecette' => $_POST['idt']


		));
		header('location: Detail.php?id='.$_POST['idt']);

}
catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
			echo 'ça ne marche pas';
		}



?>