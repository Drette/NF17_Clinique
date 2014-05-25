<html>
<meta http-equiv="Content-Type" content="text/html charset=UTF-8">
<h1> Formulaire de prise de rendez vous à la clinique </h1>
<h2> Récapitulation de votre rendez vous </h2>
<body>
<?php 
include "connect.php";
$vConn=mConnect();
session_start();

if (empty($_POST['date']))
	{
		echo"Merci de remplir le champ date !"; 
		echo"<p><a href='Rendezvous.php'>Retouner au formulaire </a> ";
	}
else	
	{
	$vNumAnimal=$_POST['code'];
	$vDate=$_POST['date'];
	$vHeure=$_POST['heure'];
	$vAnnee=substr($vDate, 0, 4);
	$vMois=substr($vDate, -5, 2);
	$vJour=substr($vDate, 8, 2);
	echo "Annee =$vAnnee\n";
	echo "Mois =$vMois\n";
	echo "Jour =$vJour\n";

	$vdate1=mktime($vHeure,0,0,$vMois,$vJour,$vAnnee);
	$vdate2=date("Y-m-d H:i:s",$vdate1);	

// le veto

	$vSql = "SELECT v.num_veterinaire FROM projet.veterinaire as v LEFT OUTER JOIN projet.rendezvous as rdv  ON v.num_veterinaire=rdv.veterinaire WHERE rdv.date ='".$vdate2."';"; 
// On récupère les vétos déjà occupés à l'heure et la date demandées par le client
	$vQuery=pg_query($vConn, $vSql);
	while ($vResult = pg_fetch_array($vQuery, null,PGSQL_ASSOC)) // on place les vétos déjà occupés dans un tableau
		$vArray[]= $vResult['num_veterinaire'];
	print_r($vArray);


$vSql = "SELECT v.num_veterinaire FROM projet.veterinaire as v;"; 
// On récupère tous les vétérinaires
	$vVetofinal=-1;
	$vQuery=pg_query($vConn, $vSql);
	while ($vResult = pg_fetch_array($vQuery, null,PGSQL_ASSOC))
		{
			$vOccupe=-1;
			$vVeto= $vResult['num_veterinaire']; // on teste pour chaque vétérinaire si il est occupé à ce moment là ou pas
			echo "Num véto=$vVeto<br>";			
			foreach ($vArray as $i => $value) 
			{
				echo " valeur dans tab $value<br>";
				if(!strcmp($vVeto,$value))
					$vOccupe=0;
				echo " valeur de occupe $vOccupe<br>";
			}
			if($vOccupe==-1) // si il n'est pas occupé on récupère sa valeur dans le tableau
				$vVetofinal=$vVeto;
		}
	if($vVetofinal==-1)
	{
		echo"Votre rendez vous est impossible, aucun vétérinaire n'est disponible<br>";
	
	}
	else
	{
		echo "Les informations suivantes ont été enregistrées :num = '$vNumAnimal' date = '$vdate2', véto ='$vVetofinal'";

		$vSql = "INSERT INTO projet.rendezvous(animal,veterinaire,date) VALUES( '$vNumAnimal','$vVetofinal','".$vdate2."');"; 
		$vQuery=pg_query($vConn, $vSql);
	}
}
?>
<p></p>
<a href='Rendezvous.php'>Retourner au formulaire rendez vous</a>
</body>
</html>
