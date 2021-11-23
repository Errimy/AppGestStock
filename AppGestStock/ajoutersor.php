<?php
session_start();
error_reporting(null);
$db = new mysqli("localhost", "root", "", "app");
if (isset($_POST['submit'])) {

    $qte_sor = $db->real_escape_string($_POST['qte_sor']);
    $date_sor = date('Y-m-d',strtotime($_POST['date_sor']));
	$prix_sor = $db->real_escape_string($_POST['prix_sor']);
    $date_sor = date('Y-m-d', time());

	$sql = "INSERT INTO sortie (qte_sor, date_sor, prix_sor) VALUE ('$qte_sor','$date_sor', '$prix_sor') ";
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

		<form method="post" action="ajoutersor.php">
			<p><b><font size="6">Ajouter un bon de sortie :</font></b></p>
			<br>
			<input type="number" name="qte_sor" placeholder="quantité" required/>
			<br> <br>
			<input type="number" step="any" name="prix_sor" placeholder="prix" required/>
			<br> <br>
			<input type="submit" name="submit" value="Ajouter">

		</form>

</body>
</html>
