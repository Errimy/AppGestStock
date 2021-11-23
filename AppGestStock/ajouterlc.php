<?php 
session_start();

$db = new mysqli("localhost", "root", "", "app");
if (isset($_POST['submit'])) {

	$art_lc = $db->real_escape_string($_POST['art_lc']);
	$qte_lc = $db->real_escape_string($_POST['qte_lc']);
	$prix_lc = $db->real_escape_string($_POST['prix_lc']);
	$montant = $db->real_escape_string($_POST['montant']);
	
	
	$sql = "INSERT INTO lc (art_lc, qte_lc, prix_lc, montant) VALUE ('$art_lc','$qte_lc', '$prix_lc', '$montant') ";
	mysqli_query($db, $sql);
	$_SESSION['message']= "ligne commande ajouté";
  	$_SESSION['msg_type']= "success";

	header("location:/lc.php");
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
		<form method="post" action="ajouterlc.php">
		<div class="form-group" style="text-align:center;">
			<p align='center'><b><font size="6">Ajouter une ligne commande :</font></b></p>
			<br>
			<input type="text" name="art_lc" placeholder="article" required/>
			<br><br>
			<input type="number" name="qte_lc" placeholder="quantité" required/>
			<br> <br>
			<input type="number" step="any" name="prix_lc" placeholder="prix" required/>
			<br> <br>
			<input type="number" step="any" name="montant" placeholder="montant" required/>
			<br> <br>
			<input type="submit" name="submit" value="Ajouter" class='btn btn-primary'>
			</div>
		</form>
		</div>
</body>
</html>