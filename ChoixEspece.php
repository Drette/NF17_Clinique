<html>
<meta http-equiv="Content-Type" content="text/html charset=UTF-8">
<h1> Formulaire d'inscription d'un animal à la clinique </h1>
<h2> L'espèce de votre animal </h2>
<body>
<form method="POST" action="FormAnimal.php">

<p>Choisir son espèce : </p>


<?php
include "connect.php";
$vConn=mConnect();
echo "<select name='espece'>";  
$vSql = "SELECT nom_e FROM projet.espece;"; 
$vQuery=pg_query($vConn, $vSql);
while ($vResult = pg_fetch_array($vQuery, null,PGSQL_ASSOC))
{ 
	echo "<option value=".$vResult['nom_e'].">".$vResult['nom_e']."</option>"; 
} 
echo "</select>";  
?>  

<p><a href="RajoutEspece.html">Votre espèce n'existe pas ? Ajouter en une  !</a> 
</p>


<input type="submit" value="Continuez" />
</form>
<a href='bonjourClient.html'>Retourner à la page d'accueil</a>
</html>
