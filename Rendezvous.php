<html>
<meta http-equiv="Content-Type" content="text/html charset=UTF-8">
<h1> Formulaire de prise de rendez vous à la clinique </h1>
<h2> Choississez votre date </h2>
<body>
<form method="POST" action="AjoutRendezvous.php">
<p>Entrez la date et l'heure   : <input type="date" name="date" max="2012-06-25" min="2011-08-13"/></p>


<p>Choissisez l'animal pour le rendez vous   : </p>
<table border="1">
<tr><td>Nom </td><td>Genre </td><td>Date de naissance</td><td> Race</td><td>Espece</td><td>Animal à examiner</td></tr>


<form method="POST" action="PriseRendezvous.php">
<?php
session_start();
$_SESSION['id_client'] = '1';
$vClient=$_SESSION['id_client'];
//a modifier

include "connect.php";
$vConn=mConnect();
  $vSql ="SELECT code_animal,nom,genre,date_naissance,race,espece FROM projet.animal where proprietaire='$vClient';";
  $vQuery=pg_query($vConn, $vSql);

  while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
    echo "<tr>";
    echo "<td>$vResult[nom]</td>";
    echo "<td>$vResult[genre]</td>";
    echo "<td>$vResult[date_naissance]</td>";
    echo "<td>$vResult[race]</td>";
    echo "<td>$vResult[espece]</td>";
    echo"<td><INPUT type= 'radio' name='code' value='$vResult[code_animal]'></td>";
    echo "</tr>";
  }

// Date et heure libre dans la table Rendez vous vérifier que le véto n'en n'a pas d'autre à cette heure là sinon incrémentation du num du véto?
?>
</table>

<input type="submit" value="Enregistrer" />
</form>
<a href='bonjourClient.html'>Retourner à la page d'acceuil</a>
</body>
</html>
