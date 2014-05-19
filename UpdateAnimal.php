<html>
<meta http-equiv="Content-Type" content="text/html charset=UTF-8">
<h1> Formulaire de modification d'un animal à la clinique </h1>
<h2> Récapitulation de la modification de votre animal </h2>
<body>
<?php 
include "connect.php";
$vConn=mConnect();

if (empty($_POST['date']))
	{
		echo"Merci de remplir le champ date !"; 
		echo"<p><a href='ModifAnimal.php'>Retouner au formulaire </a> ";
	}
else	
	{
/*
	On considère qu'un animal ne change pas de race ni d'espèce. Est ce que un animal peut changer de propriétaire ?
	$vRace=$_POST['race'];
	$vRace=str_replace(" ","_",$vRace);
	$vEspece=$_POST['espece'];
	$vEspece=str_replace(" ","_",$vEspece);
*/
	$vNom=$_POST['nom'];
	$vNom=str_replace(" ","_",$vNom);
	$vSexe=$_POST['sexe'];
	$vPoids=$_POST['poids'];
	$vTaille=$_POST['taille'];
	$vDate=$_POST['date'];
	session_start();
	$vNumAnimal=$_SESSION['codeAnimal']; // on récupère l'id de l'animal via la session avec le tableau

	echo "Les informations suivantes ont été enregistrées :num = '$vNumAnimal' nom = '$vNom', genre ='$vSexe', poids = '$vPoids', taille = '$vTaille'";
	//ne contiennent pas de caractères spéciaux ? 
	$vSql = "UPDATE projet.animal SET nom='$vNom', genre='$vSexe',poids='$vPoids', date_naissance='$vDate', taille='$vTaille' WHERE code_animal='$vNumAnimal' ;"; 
	$vQuery=pg_query($vConn, $vSql);
	}
?>
<p></p>
<a href='VoirAnimal.php'>Retourner à la liste de vos animaux</a>
</body>
</html>
