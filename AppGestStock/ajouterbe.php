<?php 
session_start();

$db = new mysqli("localhost", "root", "", "app");
if (isset($_POST['submit'])) {

	$art_ent = $db->real_escape_string($_POST['art_ent']);
    $qte_ent = $db->real_escape_string($_POST['qte_ent']);
    $date_ent = date('Y-m-d',strtotime($_POST['date_ent']));
    $prix_ent = $db->real_escape_string($_POST['prix_ent']);
    $date_ent = date('Y-m-d', time());

	
	
	$sql = "INSERT INTO entrée (art_ent, qte_ent, prix_ent, date_ent) VALUE ('$art_ent','$qte_ent', '$prix_ent','$date_ent') ";
	mysqli_query($db, $sql);
	$_SESSION['message']= "Bon d'entrée ajouté";
  	$_SESSION['msg_type']= "success";

	header("location:/be.php");
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
		<form method="post" action="ajouterbe.php">
		<div class="form-group" style="text-align:center;">
			<p align='center'><b><font size="6">Ajouter un bon d'entrée :</font></b></p>
			<br>
			<input type="text" name="art_ent" placeholder="Article" required/>
			<br><br>
			<input type="number" name="qte_ent" placeholder="Quantité" required/>
			<br> <br>
			<input type="number" step="any" name="prix_ent" placeholder="Prix d'entrée" required/>
			<br> <br>
			<input type="submit" name="submit" value="Ajouter" class='btn btn-primary'>
			</div>
		</form>
		</div>
</body>
</html>