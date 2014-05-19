<html>
<meta http-equiv="Content-Type" content="text/html charset=UTF-8">
<h1> Formulaire de prise de rendez vous à la clinique </h1>
<h2> Récapitulation de votre rendez vous </h2>
<body>
<?php 
include "connect.php";
$vConn=mConnect();

if (empty($_POST['date']))
	{
		echo"Merci de remplir le champ date !"; 
		echo"<p><a href='Rendezvous.php'>Retouner au formulaire </a> ";
	}
else	
	{
	$vNumAnimal=$_SESSION['code']; // on récupère l'id de l'animal via la session avec le tableau
	$vDate=$_POST['date'];
// le veto

	$vSql = "SELECT v.num_veterinaire FROM  projet.veterinaire as v LEFT OUTER JOIN projet.rendezvous as rdv  ON v.num_veterinaire=rdv.veterinaire WHERE rdv.date <>'$vDate';"; 
// vérifier aussi que les rendez vous ne se chevauchent pas
	$vQuery=pg_query($vConn, $vSql);
	if ($vResult = pg_fetch_array($vQuery, null,PGSQL_ASSOC)) // if car on récupère au hasard un vétérinaire libre à ce moment là
		$vVeto= $vResult['num_veterinaire'];
	
	echo "Les informations suivantes ont été enregistrées :num = '$vNumAnimal' date = '$vDate', véto ='$vVeto'";

	$vSql = "INSERT INTO projet.rendezvous(animal,veterinaire,date) VALUES( '$vNumAnimal','$vDate','$vVeto');"; 
	$vQuery=pg_query($vConn, $vSql);
	}
?>
<p></p>
<a href='Rendezvous.php'>Retourner au formulaire rendez vous</a>
</body>
</html>
