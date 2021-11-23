<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app";
// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
$id_fourn=0;
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

if (isset ($_GET['edit'])){
  $id_fourn= $_GET['edit'];
  $result= $mysqli->query("SELECT * FROM fournisseur WHERE id_fourn=$id_fourn") or die($mysqli->error());
  if (count(array($result))==1){
  $row= $result->fetch_array();

    $nom_fourn = $row['nom_fourn'];
    $codep = $row['codep'];
    $ville = $row['ville'];
	$pays = $row['pays'];
	$tél_fourn = $row['tél_fourn'];
	$adresse_fourn = $row['adresse_fourn'];
	$email_fourn = $row['email_fourn'];
}
}
if (isset ($_POST['submit'])){
    $id_fourn= $_POST['id_fourn'];
    $nom_fourn = $_POST['nom_fourn'];
    $codep = $_POST['codep'];
    $ville = $_POST['ville'];
	$pays = $_POST['pays'];
	$tél_fourn = $_POST['tél_fourn'];
	$adresse_fourn = $_POST['adresse_fourn'];
	$email_fourn = $_POST['email_fourn'];
    $mysqli->query("UPDATE fournisseur SET nom_fourn='$nom_fourn', codep=$codep, ville='$ville', pays='$pays', tél_fourn=$tél_fourn, adresse_fourn='$adresse_fourn', email_fourn='$email_fourn' WHERE id_fourn=$id_fourn ") or die($mysqli->error());
    
    $_SESSION['message']= "Fournisseur modifié";
    $_SESSION['msg_type']= "warning";
    
    header("location: /fourn2.php");
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
		<form method="post" action="/editf.php">
        <input type='hidden' name='id_fourn' value='<?php echo $id_fourn;?>'>
		<div class="form-group" style="text-align:center;">
			<p align='center'><b><font size="6">Modifier un Fournisseur :</font></b></p>
			<br>
			<input type="text" name="nom_fourn" value="<?php echo $nom_fourn;?>" required/>
			<br><br>
			<input type="number" name="codep" value="<?php echo $codep;?>" required/>
			<br> <br>
			<input type="text" name="ville" value="<?php echo $ville;?>" required/>
			<br> <br>
			<input type="text" name="pays" value="<?php echo $pays;?>" required/>
            <br> <br>
            <input type="number" name="tél_fourn" value="<?php echo $tél_fourn;?>" required/>
			<br><br>
			<input type="text" name="adresse_fourn" value="<?php echo $adresse_fourn;?>" required/>
			<br> <br>
			<input type="text" name="email_fourn" value="<?php echo $email_fourn;?>" required/>
			<br> <br>
			<input type="submit" name="submit" value="Modifier" class='btn btn-primary'>
			</div>
		</form>
		</div>
</body>
</html>