<html>

<meta http-equiv="Content-Type" content="text/html charset=UTF-8">

<h1> Formulaire d'inscription d'un animal à la clinique </h1>

<body>

<form method="POST" action="AjoutAnimal.php">



<h2> Entrer les informations relatives à votre animal <h2>

<p>Entrez son nom : <input type="text" name="nom"/></p>

<p>Choisir son sexe : 

<select name="sexe">

    <option value="Masculin">Masculin</option>

    <option value="Feminin">Féminin</option>

    <option value="Asexue">Asexué</option>

</select>



</p>

<p>Entrez son poids en kg : <input type="text" name="poids"/></p>

<p>Entrez sa date de naissance : <input type="text" name="date"/></p>

<p>Entrez sa taille en cm : <input type="text" name="taille"/></p>

<p>Choisir sa race : 

<?php 



session_start();



$_SESSION['id_client'] = '1';

if(empty($_SESSION['esp']))

{	

	$vEspece=$_POST['espece'];

	$_SESSION['esp'] = $vEspece;

}

else 

	$vEspece=$_SESSION['esp'];

include "connect.php";

$vConn=mConnect(); 

echo "<select name='race'>";  

$vSql = "SELECT nom_r FROM projet.race WHERE espece ='$vEspece';"; 

$vQuery=pg_query($vConn, $vSql);

while ($vResult = pg_fetch_array($vQuery, null,PGSQL_ASSOC))

{ 

	echo "<option value=".$vResult['nom_r'].">".$vResult['nom_r']."</option>"; 



} 

echo "</select>";  

?>  

<p><a href="RajoutRace.html">La race de votre animal n'existe pas ? Ajouter en une  !</a> 

</p>





</p>

<input type="submit" value="Enregistrer" />



</form>

</body>

</html>
