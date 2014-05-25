<html>
<meta http-equiv="Content-Type" content="text/html charset=UTF-8">
<h1> Formulaire de modification de votre compte </h1>
<body>
<form method="POST" action="UpdateClient.php">

<h2> Changer les informations relatives à votre compte <h2>

<?php 
include "connect.php";
session_start();
$vConn=mConnect(); 
$vNumClient=1;


$vSql = "SELECT nom,prenom,tel,adresse FROM projet.client WHERE num_client='$vNumClient';"; 
$vQuery=pg_query($vConn, $vSql);
while ($vResult = pg_fetch_array($vQuery, null,PGSQL_ASSOC))
{ 
	$vNom=$vResult['nom'];
	$vPrenom=$vResult['prenom'];
	$vTel=$vResult['tel'];
	$vAd=$vResult['adresse'];
	
} 

?>

<p>Votre nom : <input type="text" name="nom"  value="<?php echo $vNom ?>" /></p>
<p>Votre prénom : <input type="text" name="prenom"  value="<?php echo $vPrenom ?>" /></p>
<p>Votre téléphone : <input type="text" name="tel" value="<?php echo $vTel ?>" /></p>
<p>Votre adresse : <input type="text" name="adresse" value="<?php echo $vAd ?>" /></p>


</p>
<input type="submit" value="Enregistrer" />

</form>
<br>
<a href='bonjourClient.html'>Retourner à la page d'accueil</a>
</body>
</html>
