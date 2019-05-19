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