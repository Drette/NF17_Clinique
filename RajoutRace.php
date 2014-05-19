<html>
<meta http-equiv="Content-Type" content="text/html charset=UTF-8">
<h1> Formulaire d'inscription d'un animal à la clinique </h1>
<h2> Récapitulation de votre enregistrement d'une espèce </h2>
<body>
<?php 
include "connect.php";
$vConn=mConnect();
session_start();
$vEspece=$_SESSION['esp'];

if (empty($_POST['newrace']))
	{
		echo"Merci de remplir le champ race  !"; 
		echo"<p><a href='RajoutRace.html'> Retour au formulaire pour ajouter une nouvelle race à l'espèce '$vEspece' </a> ";
	}
else	
	{

	$vRace=$_POST['newrace'];
	$vRace=str_replace(" ","_",$vRace);
	echo "$vRace";
	echo "Les informations suivantes ont été enregistrées : L'ajout de la race='$vRace' à l'espèce '$vEspece'";
	//ne contiennent pas de caractères spéciaux ? 
	$vSql = "INSERT INTO projet.race(nom_r,espece) VALUES ('$vRace','$vEspece');"; 
	$vQuery=pg_query($vConn, $vSql);
	}
?>
<a href='FormAnimal.php'>Accéder au formulaire</a>
</body>
</html>
