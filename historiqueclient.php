<html>
<meta http-equiv="Content-Type" content="text/html charset=UTF-8">
<h1> Historique de vos factures et visites chez nos vétérinaires </h1>
<h2> Vos factures <br> </h2>
<body>
<table border="1">
<tr><td>Num Animal </td><td>Nom Animal </td><td>Prix prestation</td><td>Type de prestation</td><td>Date</td></tr>

<?php
session_start();
$_SESSION['id_client'] = '1';
$vClient=$_SESSION['id_client'];
//a modifier
include "connect.php";
$vConn=mConnect();

  $vSql ="SELECT a.code_animal, a.nom, p.prix,p.type,f.date_paiement FROM projet.animal as a, projet.prestation as p, projet.facture as f where a.proprietaire='$vClient' and a.code_animal=p.code_animal and f.animal=a.code_animal;";

  $vQuery=pg_query($vConn, $vSql);

  while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
    echo "<tr>";
    echo "<td>$vResult[code_animal]</td>";
    echo "<td>$vResult[nom]</td>";
    echo "<td>$vResult[prix] € </td>";
    echo "<td>$vResult[type]</td>";
    echo "<td>$vResult[date_paiement]</td>";
    echo "</tr>";
  }
?>
</table>


<h3> Vos visites </h3>
<table border="1">
<tr><td>Num Animal </td><td>Nom Animal </td><td>Vétérinaire</td><td>Date</td></tr>

<?php

  $vSql ="SELECT a.code_animal, a.nom, v.nom,v.prenom,rdv.date FROM projet.animal as a, projet.veterinaire as v, projet.rendezvous as rdv where a.proprietaire='$vClient' and a.code_animal=rdv.animal and rdv.veterinaire=v.num_veterinaire;";

  $vQuery=pg_query($vConn, $vSql);

  while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
    echo "<tr>";
    echo "<td>$vResult[code_animal]</td>";
    echo "<td>$vResult[nom]</td>";
    echo "<td>$vResult[nom] $vResult[prenom]</td>";
    echo "<td>$vResult[date]</td>";
    echo "</tr>";
  }

?>
</table>
</body>

<a href='bonjourClient.html'>Retourner à la page d'acceuil</a>
</html>
