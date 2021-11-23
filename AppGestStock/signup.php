<?php 
session_start();

$db = new mysqli("localhost", "root", "", "app");
if (isset($_POST['submit'])) {

	$login = $db->real_escape_string($_POST['login']);
	$mdp = $db->real_escape_string($_POST['mdp']);
	$nom_uti = $db->real_escape_string($_POST['nom_uti']);
	$prénom_uti = $db->real_escape_string($_POST['prénom_uti']);
	$role_uti = $db->real_escape_string($_POST['role_uti']);
	$tél_uti = $db->real_escape_string($_POST['tél_uti']);
	$adresse_uti = $db->real_escape_string($_POST['adresse_uti']);
	$email_uti = $db->real_escape_string($_POST['email_uti']);
	
	$sql = "INSERT INTO utilisateur (login, mdp, nom_uti, prénom_uti, role_uti, tél_uti, adresse_uti, email_uti) VALUE ('$login','$mdp', '$nom_uti','$prénom_uti', '$role_uti','$tél_uti','$adresse_uti','$email_uti') ";
	mysqli_query($db, $sql);
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
		<form method="post" action="signup.php">
		<div class="form-group" style="text-align:center;">
			<p><b><font size="6">Créer un compte</font></b></p>
			<br>
			<input type="text" name="login" placeholder="login" required/>
			<br><br>
			<input type="password" name="mdp" placeholder="mot de passe" required/>
			<br> <br>
			<input type="text" name="nom_uti" placeholder="nom" required/>
			<br><br>
			<input type="text" name="prénom_uti" placeholder="prénom" required/>
			<br> <br>
			<input type="text" name="role_uti" placeholder="role" required/>
			<br> <br>
			<input type="number" name="tél_uti" placeholder="téléphone" required/>
			<br><br>
			<input type="text" name="adresse_uti" placeholder="adresse" required/>
			<br> <br>
			<input type="text" name="email_uti" placeholder="email" required/>
			<br><br>
			<input type="submit" name="submit" value="Créer" class='btn btn-primary'>
			
			</div>
		</form>
		</div>

</body>
</html>