<?php 
session_start();

$db = new mysqli("localhost", "root", "", "app");
if (isset($_POST['submit'])) {

	$art_sor = $db->real_escape_string($_POST['art_sor']);
    $qte_sor = $db->real_escape_string($_POST['qte_sor']);
    $date_sor = date('Y-m-d',strtotime($_POST['date_sor']));
    $prix_sor = $db->real_escape_string($_POST['prix_sor']);
    $date_sor = date('Y-m-d', time());

	
	
	$sql = "INSERT INTO sortie (art_sor, qte_sor, prix_sor, date_sor) VALUE ('$art_sor','$qte_sor', '$prix_sor','$date_sor') ";
	mysqli_query($db, $sql);
	$_SESSION['message']= "Bon de sortie ajouté";
  	$_SESSION['msg_type']= "success";

	header("location:/bs.php");
}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>appstock</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	
	<div class="hok">
		<div class='container'>
		<form method="post" action="ajouterbs.php">
		<div class="form-group" style="text-align:center;">
			<p align='center'><b><font size="6">Ajouter un bon de sortie :</font></b></p>
			<br>
			<input type="text" name="art_sor" placeholder="Article" required/>
			<br><br>
			<input type="number" name="qte_sor" placeholder="Quantité" required/>
			<br> <br>
			<input type="number" step="any" name="prix_sor" placeholder="Prix de sortie" required/>
			<br> <br>
			<input type="submit" name="submit" value="Ajouter" class='btn btn-primary'>
			</div>
		</form>
		</div>
</body>