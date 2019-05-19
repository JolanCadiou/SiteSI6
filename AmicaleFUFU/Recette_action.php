
<?php
session_start ();

if (empty($_POST['temps_necessaire']))
			{
				$temps_necessaire ="";
			}
			if (empty($_POST['photo']))
			{
				$photo ="";
			}
			else
			{
				$photo = $_POST['photo'];
			}
			if (empty($_POST['ingredient2']))
			{
				$ingredient2 = "";
			}
			if (empty($_POST['ingredient3']))
			{
				$ingredient3 = "";
			}
			if (empty($_POST['ingredient4']))
			{
				$ingredient4 = "";
			}
			if (empty($_POST['ingredient5']))
			{
				$ingredient5 = "";
			}
			
			
			
$target_dir = "Recette_Image/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["photo"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=solibio_bdd_true;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


	try{
			$photo = basename( $_FILES["photo"]["name"]);
			
			$req = $bdd-> prepare('INSERT INTO Recette(titre,temps_necessaire,preparation,photo,ingredient1,ingredient2,ingredient3,ingredient4,ingredient5) VALUES(:titre,:temps_necessaire,:preparation,:photo,:ingredient1,:ingredient2,:ingredient3,:ingredient4,:ingredient5)');
			$req -> execute(array(
			
			
			'titre' => htmlspecialchars($_POST['titre']),
			'temps_necessaire' => htmlspecialchars($_POST['temps_necessaire']),
			//'temps_necessaire' => $temps_necessaire,
			'preparation' => htmlspecialchars($_POST['preparation']),
			'photo' => $photo,
			'ingredient1' => htmlspecialchars($_POST['ingredient1']),
			'ingredient2' => htmlspecialchars($_POST['ingredient2']),
			'ingredient3' => htmlspecialchars($_POST['ingredient3']),
			'ingredient4' => htmlspecialchars($_POST['ingredient4']),
			'ingredient5' => htmlspecialchars($_POST['ingredient5']),
			));
		}
		catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());	
}
			
/*try
{
	$bdd = new PDO('mysql:host=localhost;dbname=solibio_bdd_true;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
		'nom' =>  htmlspecialchars($_POST['nom']),
}
	try {
									$req = $bdd->prepare('INSERT INTO utilisateurmdp(nom, prenom, mdp, mail ) VALUES(:nom, :prenom, :mdp, :mail)');
			$marche = $bdd->prepare('Update utilisateurmdp SET PP = ? WHERE id = ?	' );
			$marche -> execute(array(
			
			$PP = basename( $_FILES["fileToUpload"]["name"]),
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
	
*/



	




?>
