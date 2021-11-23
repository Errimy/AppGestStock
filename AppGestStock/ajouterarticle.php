<?php 
session_start();

$db = new mysqli("localhost", "root", "", "app");
if (isset($_POST['submit'])) {

	$libellé_art = $db->real_escape_string($_POST['libellé_art']);
	$qte_art = $db->real_escape_string($_POST['qte_art']);
	$prix_art = $db->real_escape_string($_POST['prix_art']);
	$art_f = $db->real_escape_string($_POST['art_f']);
	$art_m = $db->real_escape_string($_POST['art_m']);
	$emplacement = $db->real_escape_string($_POST['emplacement']);
	
	
	$sql = "INSERT INTO article (libellé_art, qte_art, prix_art, art_f, art_m, emplacement) VALUE ('$libellé_art','$qte_art', '$prix_art', '$art_f', '$art_m','$emplacement') ";
	mysqli_query($db, $sql);
	$_SESSION['message']= "Article ajouté";
  	$_SESSION['msg_type']= "success";

	header("location:/test.php");
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
		<form method="post" action="ajouterarticle.php">
		<div class="form-group" style="text-align:center;">
			<p align='center'><b><font size="6">Ajouter un article :</font></b></p>
			<br>
			<input type="text" name="libellé_art" placeholder="libellé" required/>
			<br><br>
			<input type="number" name="qte_art" placeholder="quantité" required/>
			<br> <br>
			<input type="number" step="any" name="prix_art" placeholder="prix" required/>
			<br> <br>
			<input type="text" name="art_f" placeholder="fournisseur" required/>
			<br> <br>
			<input type="text" name="art_m" placeholder="magasin" required/>
			<br> <br>
			<input type="text" name="emplacement" placeholder="emplacement" required/>
			<br> <br>
			<input type="submit" name="submit" value="Ajouter" class='btn btn-primary'>
			</div>
		</form>
		</div>
</body>
</html>