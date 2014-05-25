<!doctype html>
<html>
<!--<meta http-equiv="Content-Type" content="text/html charset=UTF-8"> -->
<meta charset="utf-8">
<h1> Formulaire de prise de rendez vous à la clinique </h1>
<h2> Choississez votre date </h2>
<body>
<form method="POST" action="PriseRendezvous.php">
<!--<p>Entrez la date et l'heure   : <input type="date" name="date" max="2012-06-25" min="2011-08-13"/></p> -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="jquery.ui.datepicker-fr.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
//$.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );
$( "#datepicker" ).datepicker({ minDate: 0, maxDate: "+6M",dateFormat: 'yy mm dd',firstDay:1, onSelect: function(e, b){a = new Date(); a.setFullYear(b.selectedYear, b.selectedMonth, b.selectedDay); if(a.getDay() == 6 || a.getDay() == 0) $(b.input).val(b.lastVal);}});
// les jours 6 et 0 sont les samedis et dimanches qui ne sont plus selectionnables

//$( "#datepicker" ).datepicker( $.datepicker.regional[ "fr" ] );




});
</script>
<p>Date (les vétérinaires ne prennent pas de rendez vous le samedi et dimanche) : <input type="text" id="datepicker" name="date"/></p>

<p>Choisir l'heure : 
<select name="heure" >
    <option value="8">8 heure</option>
    <option value="9">9 heure</option>
    <option value="10">10 heure</option>
    <option value="11">11 heure</option>
    <option value="12">12 heure</option>
    <option value="14">13 heure</option>
    <option value="15">14 heure</option>
    <option value="16">15 heure</option>
    <option value="17">16 heure</option>
</select>
<!-- On considère que tous les rendez vous durent une heure -->


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
?>




<!-- Date et heure libre dans la table Rendez vous vérifier que le véto n'en n'a pas d'autre à cette heure là sinon incrémentation du num du véto? -->

</table>

<input type="submit" value="Enregistrer" />
</form>
<a href='bonjourClient.html'>Retourner à la page d'acceuil</a>
</body>
</html>
