<html>
<meta http-equiv="Content-Type" content="text/html charset=UTF-8">
<h1> Formulaire de modification de votre compte </h1>
<h2> Récapitulation de la modification de votre compte </h2>
<body>
<?php 
include "connect.php";
$vConn=mConnect();

if (empty($_POST['nom']) || empty($_POST['tel']) )
	{
		echo"Merci de remplir au minimum votre nom et téléphone !"; 
		echo"<p><a href='ModifClient.php'>Retouner au formulaire </a> ";
	}
else	
	{
	$vNom=$_POST['nom'];
	$vNom=str_replace(" ","_",$vNom);
	$vPrenom=$_POST['prenom'];
	$vPrenom=str_replace(" ","_",$vPrenom);
	$vTel=$_POST['tel'];
	$vAd=$_POST['adresse'];
	session_start();
	$vNumClient=$_SESSION['id_client']; 

	echo "Les informations suivantes ont été enregistrées :num = '$vNumClient' nom = '$vNom', prenom ='$vPrenom', téléphone = '$vTel', adresse = '$vAd'";

	$vSql = "UPDATE projet.client SET nom='$vNom', prenom='$vPrenom',tel='$vTel', adresse='$vAd' WHERE num_client='$vNumClient' ;"; 
	$vQuery=pg_query($vConn, $vSql);
	}
?>
<p></p>
<a href='bonjourClient.html'>Retourner à la page d'accueil</a>
</body>
</html>
