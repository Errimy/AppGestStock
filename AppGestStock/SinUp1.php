<?php 
session_start();

$db = new mysqli("localhost", "root", "", "app");
if (isset($_POST['submit'])) {

	$login_uti = $db->real_escape_string($_POST['login_uti']);
	$mdp_uti = $db->real_escape_string($_POST['mdp_uti']);
	$nom_uti = $db->real_escape_string($_POST['nom_uti']);
	$prénom_uti = $db->real_escape_string($_POST['prénom_uti']);
	$role_uti = $db->real_escape_string($_POST['role_uti']);
	$tél_uti = $db->real_escape_string($_POST['tél_uti']);
	$adresse_uti = $db->real_escape_string($_POST['adresse_uti']);
	$email_uti = $db->real_escape_string($_POST['email_uti']);
	
	$sql = "INSERT INTO utilisateur (login_uti, mdp_uti, nom_uti, prénom_uti, role_uti, tél_uti, adresse_uti, email_uti) VALUE ('$login_uti','$mdp_uti', '$nom_uti','$prénom_uti', '$role_uti','$tél_uti','$adresse_uti','$email_uti') ";
	mysqli_query($db, $sql);
}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>appstock</title>
	<link rel="stylesheet" type="text/css" href="Forma.css">
</head>
<body>
	
	<div class="hok">

		<form method="post" action="signup.php">
			<p><b><font size="6">Create an account</font></b></p>
			<br>
			<input type="text" name="login_uti" placeholder="login" required/>
			<br><br>
			<input type="password" name="mdp_uti" placeholder="mot de passe" required/>
			<br> <br>
			<input type="text" name="nom_uti" placeholder="nom" required/>
			<br><br>
			<input type="text" name="prénom_uti" placeholder="prénom" required/>
			<br> <br>
			<input type="text" name="role_uti" placeholder="role" required/>
			<br> <$br>
			<input type="text" name="tél_uti" placeholder="téléphone" required/>
			<br><br>
			<input type="text" name="adresse_uti" placeholder="adresse" required/>
			<br> <br>
			<input type="text" name="email_uti" placeholder="email" required/>
			<br><br>
			<input type="submit" name="submit" value="Create">
			
		</form>

</body>
</html>