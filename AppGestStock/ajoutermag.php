<?php 
session_start();

$db = new mysqli("localhost", "root", "", "app");
if (isset($_POST['submit'])) {

	$nom_mag = $db->real_escape_string($_POST['nom_mag']);
	
	
	$sql = "INSERT INTO magasin (nom_mag) VALUE ('$nom_mag') ";
	mysqli_query($db, $sql);
	$_SESSION['message']= "Magasin ajouté";
  	$_SESSION['msg_type']= "success";

	header("location:/mag.php");
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
		<form method="post" action="ajoutermag.php">
		<div class="form-group" style="text-align:center;">
			<p align='center'><b><font size="6">Ajouter une magasin:</font></b></p>
			<br>
			<input type="text" name="nom_mag" placeholder="Nom de magasin" required/>
			<br><br>
			<input type="submit" name="submit" value="Ajouter" class='btn btn-primary'>
			</div>
		</form>
		</div>
</body>
</html>