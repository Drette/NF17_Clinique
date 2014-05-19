<html>
<meta http-equiv="Content-Type" content="text/html charset=UTF-8">
<h1> Formulaire d'inscription d'un animal à la clinique </h1>
<h2> Récapitulation de votre enregistrement </h2>
<body>
<?php 

session_start();
include "connect.php";
$vConn=mConnect();
$vNom=$_POST['nom'];
$vNom=str_replace(" ","_",$vNom);
$vSexe=$_POST['sexe'];
$vPoids=(double)$_POST['poids'];
$vTaille=(double)$_POST['taille'];
if (empty($vTaille))
	$vTaille=0.0;
$vDate=$_POST['date'];
$vRace=$_POST['race'];
$vClient=$_SESSION['id_client'];
$vEspece=$_SESSION['esp'];
if (empty($vPoids))
	$vPoids=0.0;

if (empty($vDate)) // vérifier le format de la date
	{
		echo"Merci de remplir le champ date de naissance !"; 
		echo"<p><a href='FormAnimal.php'>Retourner au formulaire</a> ";
	}
else	
	{

		
		//vérifier les champs
		echo "Les informations suivantes ont été enregistrées : <br>Client ='$vClient'<br> Nom ='$vNom'<br> Sexe='$vSexe' <br> Poids = '$vPoids'";
		echo"<br> Date de naissance = '$vDate'<br> taille ='$vTaille' <br> race='$vRace' <br> espece='$vEspece'";

		//proprietaire, espece et race doivent être not null.
		$vSql = "INSERT INTO projet.Animal(nom,genre,poids,date_naissance,taille,proprietaire,race,espece) VALUES ('$vNom','$vSexe','$vPoids','$vDate','$vTaille','$vClient','$vRace','$vEspece') ;"; 
		$vQuery=pg_query($vConn, $vSql);
	}

?>
</body>
</html>
