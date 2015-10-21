<?php
	
	echo $_POST["title"];
	
	//descripteur de fichier 
	$fp = fopen("Indic.html", "rb");
	fseek($fp, 0);
	
	//lecture des 10 premiers caractères
	$contenu_du_fichier = fgets($fp, 600);
	
	//fermeture du descripteur
	fclose($fp);
	
	echo $contenu_du_fichier;

?>