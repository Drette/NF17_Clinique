<html>
<meta http-equiv="Content-Type" content="text/html charset=UTF-8">
<h1> Formulaire d'inscription d'un animal à la clinique </h1>
<h2> Récapitulation de votre enregistrement d'une espèce </h2>
<body>
<?php 
include "connect.php";
$vConn=mConnect();



if (empty($_POST['newrace']) || empty($_POST['newespece']))
	{
		echo"Merci de remplir les champs race et espèces !"; 
		echo"<p><a href='RajoutEspece.html'>Votre espèce n'existe pas ? Ajouter en une  !</a> ";
	}
else	
	{

	$vRace=$_POST['newrace'];
	$vRace=str_replace(" ","_",$vRace);
	$vEspece=$_POST['newespece'];
	$vEspece=str_replace(" ","_",$vEspece);
	session_start();
	$_SESSION['esp']=$vEspece;
	//on met à jour l'espèce que le client vient d'ajouter en base de données.
	echo "Les informations suivantes ont été enregistrées : race='$vRace' espece='$vEspece'";
	//ne contiennent pas de caractères spéciaux ? 
	$vSql = "INSERT INTO projet.espece(nom_e) VALUES ('$vEspece') ;"; 
	$vQuery=pg_query($vConn, $vSql);
	$vSql = "INSERT INTO projet.race(nom_r,espece) VALUES ('$vRace','$vEspece') ;"; 
	$vQuery=pg_query($vConn, $vSql);
	}
?>
<a href='FormAnimal.php'>Accéder au formulaire</a>
</body>
</html>
