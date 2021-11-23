<?php 
session_start();

$db = new mysqli("localhost", "root", "", "app");
if (isset($_POST['submit'])) {

	$nom_fourn = $db->real_escape_string($_POST['nom_fourn']);
    $codep = $db->real_escape_string($_POST['codep']);
    $ville = $db->real_escape_string($_POST['ville']);
	$pays = $db->real_escape_string($_POST['pays']);
	$tél_fourn = $db->real_escape_string($_POST['tél_fourn']);
	$adresse_fourn = $db->real_escape_string($_POST['adresse_fourn']);
	$email_fourn = $db->real_escape_string($_POST['email_fourn']);
	
	$sql = "INSERT INTO fournisseur (nom_fourn, codep, ville, pays, tél_fourn, adresse_fourn, email_fourn) VALUE ('$nom_fourn','$codep','$ville', '$pays', '$tél_fourn','$adresse_fourn','$email_fourn') ";
	mysqli_query($db, $sql);
	$_SESSION['message']= "Article ajouté";
  	$_SESSION['msg_type']= "success";
	header("location:/fourn2.php");
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
		<form method="post" action="ajouterfourn.php">
		<div class="form-group" style="text-align:center;">
			<p><b><font size="6">Ajouter un fournisseur :</font></b></p>
			<br>
			<input type="text" name="nom_fourn" placeholder="nom du fournisseur" required/>
			<br><br>
			<input type="number" name="codep" placeholder="code postal" required/>
			<br> <br>
            <input type="text" name="ville" placeholder="ville" required/>
			<br> <br>
			<input type="text" name="pays" placeholder="pays" required/>
			<br><br>
			<input type="number" name="tél_fourn" placeholder="téléphone" required/>
			<br> <br>
			<input type="text" name="adresse_fourn" placeholder="adresse" required/>
			<br> <br>
			<input type="text" name="email_fourn" placeholder="email" required/>
			<br><br>
			<input type="submit" name="submit" value="Ajouter">
			</div>
		</form>
		</div>
</body>
</html>