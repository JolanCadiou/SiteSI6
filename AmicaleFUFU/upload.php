
<?php
session_start ();
$target_dir = "PP/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists  Upload Image
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000000000000) {
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
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}	

function redimmensionner_image($fichier, $nouvelle_taille){
	
	global $error;
	
	$longueur = $nouvelle_taille;
	$largeur = $nouvelle_taille;
	
	$taille = getimagesize($fichier);
	
	if ($taille){
		
		if ($taille['mime']=='image/jpeg'){
			
			$img_big = imagecreatefromjpeg($fichier);
			$img_new = imagecreate($longueur, $largeur);
			
			
			$img_petite = imagecreatetruecolor($longueur,$largeur) or $img_petite = imagecreate($longeur, $largeur);
			
			imagecopyresized($img_petite,$img_big,0,0,0,0,$longueur,$largeur,$taille[0],$taille[1]);
			imagejpeg($img_petite,$fichier);
			
		}
		
		else if($taille['mime']=='image/png'){
			
			$img_big = imagecreatefrompng($fichier);
			$img_new = imagecreate($longueur, $largeur);
			
			
			$img_petite = imagecreatetruecolor($longueur,$largeur) or $img_petite = imagecreate($longeur, $largeur);
			
			imagecopyresized($img_petite,$img_big,0,0,0,0,$longueur,$largeur,$taille[0],$taille[1]);
			imagepng($img_petite,$fichier);
			
		}
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
	try {
			$marche = $bdd->prepare('Update utilisateurmdp SET PP = ? WHERE id = ?	' );
			$marche -> execute(array(
			
			$PP = basename( $_FILES["fileToUpload"]["name"]),
			$_SESSION['id']
			)	
			
			
			);
			}
			
			catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
				echo 'ça ne marche pas';
			}
			redimmensionner_image("PP/".$PP,200);
			header('location: Profil.php');
	




	




?>
