<?php 
session_start();

$db = new mysqli("localhost", "root", "", "app");
if (isset($_POST['submit'])) {

	$fourn_com = $db->real_escape_string($_POST['fourn_com']);
    $date_com = date('Y-m-d',strtotime($_POST['date_com']));
    $etat = $db->real_escape_string($_POST['etat']);
    $date_com = date('Y-m-d', time());

	
	
	$sql = "INSERT INTO commande (fourn_com, etat, date_com) VALUE ('$fourn_com','$etat','$date_com') ";
	mysqli_query($db, $sql);
	$_SESSION['message']= "Commande ajouté";
  	$_SESSION['msg_type']= "success";

	header("location:/cmd.php");
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
		<form method="post" action="ajoutercmd.php">
		<div class="form-group" style="text-align:center;">
			<p align='center'><b><font size="6">Ajouter une commande:</font></b></p>
			<br>
			<input type="text" name="fourn_com" placeholder="fournisseur" required/>
			<br><br>
			<input type="text" name="etat" placeholder="état" required/>
			<br> <br>
			<input type="submit" name="submit" value="Ajouter" class='btn btn-primary'>
			</div>
		</form>
		</div>
</body>
</html>