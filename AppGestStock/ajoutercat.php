<?php 
session_start();

$db = new mysqli("localhost", "root", "", "app");
if (isset($_POST['submit'])) {

    $nom_cat = $db->real_escape_string($_POST['nom_cat']);
    $description = $db->real_escape_string($_POST['description']);
	
	
	$sql = "INSERT INTO catégorie (nom_cat, description ) VALUE ('$nom_cat','$description') ";
	mysqli_query($db, $sql);
	$_SESSION['message']= "Catégorie ajouté";
  	$_SESSION['msg_type']= "success";

	header("location:/cat.php");
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
		<form method="post" action="ajoutercat.php">
		<div class="form-group" style="text-align:center;">
			<p align='center'><b><font size="6">Ajouter une catégorie:</font></b></p>
			<br>
			<input type="text" name="nom_cat" placeholder="Nom de catégorie" required/>
			<br><br>
            <!--<input class="form-control" type="text" name="descritpion" placeholder="Description" rows="3">-->
            <textarea class="form-control"  type="text" name="description" placeholder="Description" rows="3" ></textarea>
			<br><br>
			<input type="submit" name="submit" value="Ajouter" class='btn btn-primary'>
			</div>
		</form>
		</div>
</body>
</html>