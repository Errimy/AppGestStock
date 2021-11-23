<?php 
session_start();
error_reporting(null);
$db = new mysqli("localhost", "root", "", "app");
if (isset($_POST['submit'])) {

    $qte_ent = $db->real_escape_string($_POST['qte_ent']);
    $date_ent = date('Y-m-d',strtotime($_POST['date_ent']));
	$prix_ent = $db->real_escape_string($_POST['prix_ent']);
    $date_ent = date('Y-m-d', time());
	
	$sql = "INSERT INTO entrée (qte_ent, date_ent, prix_ent) VALUE ('$qte_ent','$date_ent', '$prix_ent') ";
	mysqli_query($db, $sql);
}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>appstock</title>
	<link rel="stylesheet" type="text/css" href="Forma.css">
</head>
<body>
	
	<div class="hok">

		<form method="post" action="ajouterent.php">
			<p><b><font size="6">Ajouter un bon d'entrée :</font></b></p>
			<br>
			<input type="number" name="qte_ent" placeholder="quantité" required/>
			<br> <br>
			<input type="number" step="any" name="prix_ent" placeholder="prix" required/>
			<br> <br>
			<input type="submit" name="submit" value="Ajouter">

		</form>

</body>
</html>
