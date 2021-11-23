<?php 
session_start();

$db = new mysqli("localhost", "root", "", "app");
if (isset($_POST['submit'])) {

	$art_rcp = $db->real_escape_string($_POST['art_rcp']);
	$qte_rcp = $db->real_escape_string($_POST['qte_rcp']);
	$n_com = $db->real_escape_string($_POST['n_com']);
    $date_rcp = date('Y-m-d',strtotime($_POST['date_rcp']));
    $date_rcp = date('Y-m-d', time());
	
	
	$sql = "INSERT INTO rcp (art_rcp, qte_rcp, n_com, date_rcp) VALUE ('$art_rcp','$qte_rcp', '$n_com', '$date_rcp') ";
	mysqli_query($db, $sql);
	$_SESSION['message']= "réception ajouté";
  	$_SESSION['msg_type']= "success";

	header("location:/rcp.php");
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
		<form method="post" action="ajouterrcp.php">
		<div class="form-group" style="text-align:center;">
			<p align='center'><b><font size="6">Ajouter une réception :</font></b></p>
			<br>
			<input type="text" name="art_rcp" placeholder="article" required/>
			<br><br>
			<input type="number" name="qte_rcp" placeholder="quantité" required/>
			<br> <br>
			<input type="number" name="n_com" placeholder="numéro de commande" required/>
			<br> <br>
			<input type="submit" name="submit" value="Ajouter" class='btn btn-primary'>
			</div>
		</form>
		</div>
</body>
</html>