<html>
<meta http-equiv="Content-Type" content="text/html charset=UTF-8">
<h1> Vos animaux déjà inscrits :  </h1>
<body>
<table border="1">



<tr><td>Nom </td><td>Genre </td><td> Poids</td><td>Date de naissance</td><td> Taille</td><td> Race</td><td> Espece</td><td>Animal à modifier</td></tr>


<form method="POST" action="ModifAnimal.php">
<?php
session_start();
$_SESSION['id_client'] = '1';
$vClient=$_SESSION['id_client'];
//a modifier

include "connect.php";
$vConn=mConnect();
  $vSql ="SELECT code_animal,nom,genre,poids,date_naissance,taille,race,espece FROM projet.animal where proprietaire='$vClient';";
  $vQuery=pg_query($vConn, $vSql);

  while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
    echo "<tr>";
    echo "<td>$vResult[nom]</td>";
    echo "<td>$vResult[genre]</td>";
    echo "<td>$vResult[poids]</td>";
    echo "<td>$vResult[date_naissance]</td>";
    echo "<td>$vResult[taille]</td>";
    echo "<td>$vResult[race]</td>";
    echo "<td>$vResult[espece]</td>";
    echo"<td><INPUT type= 'radio' name='code' value='$vResult[code_animal]'></td>";
    echo "</tr>";
  }
?>
</table>
<input type="submit" value="Modifier l'animal"/>
</form>
<br>
<a href='bonjourClient.html'>Retourner à la page d'accueil</a>
</html>
