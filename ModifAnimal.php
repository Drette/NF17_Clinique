<html>
<meta http-equiv="Content-Type" content="text/html charset=UTF-8">
<h1> Formulaire de modification d'un animal de la clinique </h1>
<body>
<form method="POST" action="UpdateAnimal.php">

<h2> Changer les informations relatives à votre animal <h2>

<?php 
include "connect.php";
session_start();
$vConn=mConnect(); 
$vNumAnimal=$_POST['code'];
$_SESSION['codeAnimal']=$vNumAnimal;
$vSql = "SELECT nom,genre,poids,date_naissance,taille FROM projet.animal WHERE code_animal='$vNumAnimal';"; 
$vQuery=pg_query($vConn, $vSql);
while ($vResult = pg_fetch_array($vQuery, null,PGSQL_ASSOC))
{ 
	$vNom=$vResult['nom'];
	$vSexe=$vResult['genre'];
	$vPoids=$vResult['poids'];
	$vDate=$vResult['date_naissance'];
	$vTaille=$vResult['taille'];
	
} 

?>

<p>Entrez son nom : <input type="text" name="nom"  value="<?php echo $vNom ?>" /></p>
<p>Choisir son sexe : 
<select name="sexe"  value="<?php echo $vSexe ?>" >
    <option value="Masculin">Masculin</option>
    <option value="Feminin">Féminin</option>
    <option value="Asexue">Asexué</option>
</select>

</p>
<p>Entrez son poids en kg : <input type="text" name="poids" value="<?php echo $vPoids ?>" /></p>
<p>Entrez sa date de naissance : <input type="text" name="date" value="<?php echo $vDate ?>" /></p>
<p>Entrez sa taille en cm : <input type="text" name="taille" value="<?php echo $vTaille ?>" /></p>

</p>
<input type="submit" value="Enregistrer" />

</form>
</body>
</html>
